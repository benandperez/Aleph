<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\BlobService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,  BlobService $blobService): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $imageProfile = $form->get('profileUser')->getData();

            if ($imageProfile) {
                $this->uploadFile($imageProfile, $user, $blobService);

            }else{
                $container = $user->getFirstName() . "-" . uniqid();;
                $user->setUserFolderName($container);
            }
            $user->setPassword($this->passwordHasher->hashPassword($user, $form->getData()->getPassword()));
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager,  BlobService $blobService): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageProfile = $form->get('profileUser')->getData();

            if ($imageProfile) {
                $this->uploadFile($imageProfile, $user, $blobService, $update = true);

            }else{
                $container = $user->getFirstName() . "-" . uniqid();;
                $user->setUserFolderName($container);
            }
            $user->setPassword($this->passwordHasher->hashPassword($user, $form->getData()->getPassword()));
            $entityManager->flush();

            return $this->redirectToRoute('app_dashboard', [], Response::HTTP_SEE_OTHER);
//            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    public function uploadFile($imageProfile, $user, $blobService, $update = false)
    {
        $folderNameDocumentUser = $user->getFirstName() . "-" . uniqid();
        if ($imageProfile) {
            if ($update) {
                $folderNameDocumentUser = $user->getEmployeeFolderName() ;
            }
            $container = $_ENV['BLOBIMAGEPROFILE']."/".$folderNameDocumentUser;


            $newFilenameProfile = "https://" . $_ENV['ACCOUNTNAME'] . ".blob.core.windows.net/" . $_ENV['BLOBIMAGEPROFILE'] . "/" .$folderNameDocumentUser ."/". $imageProfile->getClientOriginalName();
            try {

                if (empty($imageProfile)) {
                    return new Response("No file specified", Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
                }
                $blobService->upload($imageProfile, $container);

            } catch (FileException $e) {
                print_r($e);
            }
            $user->setImageProfile($newFilenameProfile);
        }
        if (!$user->getUserFolderName() ){
            $user->setUserFolderName($folderNameDocumentUser);
        }

    }
}
