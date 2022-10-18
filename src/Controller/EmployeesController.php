<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Entity\PersonalReferences;
use App\Entity\User;
use App\Form\EmployeesType;
use App\Repository\EmployeesRepository;
use App\Repository\PersonalReferencesRepository;
use App\Service\BlobService;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\New_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/employees')]
class EmployeesController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    #[Route('/', name: 'app_employees_index', methods: ['GET'])]
    public function index(EmployeesRepository $employeesRepository): Response
    {
        return $this->render('employees/index.html.twig', [
            'employees' => $employeesRepository->findByEmployeesByStatus(1),
        ]);
    }

    #[Route('/new', name: 'app_employees_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeesRepository $employeesRepository, PersonalReferencesRepository $personalReferencesRepository, BlobService $blobService, EntityManagerInterface $entityManager): Response
    {
        $employee = new Employees();
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $orderDate = "Y/m/d";

            $imageProfile = $form->get('imageProfile')->getData();
            $documentEmployee = $form->get('documentAll')->getData();
            $documentEmployeeBanns = $form->get('documentBannsAll')->getData();

            if ($imageProfile || $documentEmployee || $documentEmployeeBanns) {
                $this->uploadFile($imageProfile, $documentEmployee, $documentEmployeeBanns, $employee, $blobService);

            }else{
                $container = $employee->getFirstName() . "-" . uniqid();;
                $employee->setEmployeeFolderName($container);
            }
            $employee->setStatus(1);

            $user = new User();
            $user->setFirstName($employee->getFirstName());
            $user->setLastName($employee->getLastName());
            $user->setEmail($employee->getPersonalEmail());
            $user->setPassword($this->passwordHasher->hashPassword($user, $employee->getDocument()));
            $user->setRoles(["ROLE_USER"]);
            $user->setStatus(true);
            $entityManager->persist($user);
            $entityManager->flush();

            $this->setDate($request, $employee,$orderDate, $personalReferencesRepository);
            $employeesRepository->add($employee, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employees_show', methods: ['GET'])]
    public function show(Employees $employee): Response
    {
        return $this->render('employees/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employees_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employees $employee, EmployeesRepository $employeesRepository, PersonalReferencesRepository $personalReferencesRepository, BlobService $blobService): Response
    {
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);
        $orderDate = "d/m/Y";

        if ($form->isSubmitted()) {
            $orderDate = "Y/m/d";
            $imageProfile = $form->get('imageProfile')->getData();
            $documentEmployee = $form->get('documentAll')->getData();
            $documentEmployeeBanns = $form->get('documentBannsAll')->getData();

            if ($imageProfile || $documentEmployee || $documentEmployeeBanns) {
                $this->uploadFile($imageProfile, $documentEmployee, $documentEmployeeBanns, $employee, $blobService, $update = true);

            }else{
                $container = $employee->getFirstName() . "-" . uniqid();
                $employee->setEmployeeFolderName($container);
            }

            $this->setDate($request, $employee, $orderDate, $personalReferencesRepository);
            $employee->setStatus(1);
            $employeesRepository->add($employee, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }
        $this->setDate($request, $employee, $orderDate, $personalReferencesRepository);
        $blobsDocument = $blobService->listBlobsEmployee($_ENV['BLOBDOCUMENT'], $employee->getEmployeeFolderName());
        $blobsDocumentBanns = $blobService->listBlobsEmployee($_ENV['BLOBDOCUMENT'], $_ENV['BLOBDOCUMENTBANNS']."-".$employee->getEmployeeFolderName());
        return $this->renderForm('employees/edit.html.twig', [
            'employee' => $employee,
            'blobsDocument' => $blobsDocument,
            'blobsDocumentBanns' => $blobsDocumentBanns,
            'banns' => $_ENV['BLOBDOCUMENTBANNS'],
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_employees_delete')]
    public function delete(Request $request, Employees $employee, EmployeesRepository $employeesRepository): Response
    {
        $employee =$employeesRepository->findOneBy(["id" => $employee->getId()]);

        $employee->setStatus(0);
        $employeesRepository->add($employee, true);


        return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
    }

    public function setDate($request, $employee, $orderDate, $personalReferencesRepository)
    {

        if (count($request->request->all()) > 0){
            $date = explode("/", $request->request->all()["employees"]["expirationDate"]);
            $dateExpirationDate = new \DateTime( date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

            $date = explode("/", $request->request->all()["employees"]["birthDay"]);
            $dateBirthDay = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

            $date = explode("/", $request->request->all()["employees"]["expirationDateLicense"]);
            $dateExpirationDateLicense = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

//            $date = explode("/", $request->request->all()["employees"]["dateJoiningCompany"]);
//            $dateDateJoiningCompany = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));


            $employee->setExpirationDate($dateExpirationDate);
            $employee->setBirthDay($dateBirthDay);
            $employee->setExpirationDateLicense($dateExpirationDateLicense);
//            $employee->setDateJoiningCompany($dateDateJoiningCompany);
            if (count($employee->getPersonalReferences()) > 0) {
                foreach ($request->request->all()["employees"]["personalReferences"] as $personalReference) {
                    $date = explode("/", $personalReference["birthDay"]);
                    $datePersonalReference = new \DateTime(date($orderDate, strtotime( $date[2]."-".$date[1]."-".$date[0] )));

                    foreach ($employee->getPersonalReferences() as $item) {
                        $item->setBirthDay($datePersonalReference);
                        $personalReferencesRepository->add($item,true);
                    }
                }
            }
        }

    }

    public function uploadFile($imageProfile, $documentsEmployee, $documentsEmployeeBanns, $employee, $blobService, $update = false)
    {
        $folderNameDocumentEmployee = $employee->getFirstName() . "-" . uniqid();
        if ($imageProfile) {
            if ($update) {
                $folderNameDocumentEmployee = $employee->getEmployeeFolderName() ;
            }
            $container = $_ENV['BLOBIMAGEPROFILE']."/".$folderNameDocumentEmployee;


            $newFilenameProfile = "https://" . $_ENV['ACCOUNTNAME'] . ".blob.core.windows.net/" . $_ENV['BLOBIMAGEPROFILE'] . "/" .$folderNameDocumentEmployee ."/". $imageProfile->getClientOriginalName();
            try {

                if (empty($imageProfile)) {
                    return new Response("No file specified", Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
                }
                $blobService->upload($imageProfile, $container);

            } catch (FileException $e) {
                print_r($e);
            }
            $employee->setImageProfile($newFilenameProfile);
        }
        if ($documentsEmployee){
            try {
                if ($update) {
                    $folderNameDocumentEmployee = $employee->getEmployeeFolderName() ;
                }

                foreach ($documentsEmployee as $documentEmployee) {
                    $blobService->upload($documentEmployee, $_ENV['BLOBDOCUMENT']."/".$folderNameDocumentEmployee);
                }
                $employee->setEmployeeFolderName($folderNameDocumentEmployee);
            } catch (FileException $ex) {
                print_r($ex);
            }

        }
        if ($documentsEmployeeBanns){
            try {
                if ($update) {
                    var_dump($employee->getEmployeeFolderName());
                    $folderNameDocumentEmployee = $employee->getEmployeeFolderName() ;
                }

                foreach ($documentsEmployeeBanns as $documentEmployeeBanns) {
                    $blobService->upload($documentEmployeeBanns, $_ENV['BLOBDOCUMENT']."/".$_ENV['BLOBDOCUMENTBANNS']."-".$folderNameDocumentEmployee);
                }
                $employee->setEmployeeFolderName($folderNameDocumentEmployee);
            } catch (FileException $ex) {
                print_r($ex);
            }

        }
        if (!$documentsEmployee && !$documentsEmployeeBanns){
            $employee->setEmployeeFolderName($folderNameDocumentEmployee);
        }

    }

    #[Route('/delete/{blobName}/{blobFolderName}/{employeeId}', name: 'app_blobs_delete_employee')]
    public function deleteBlob($blobName, $blobFolderName, $employeeId, BlobService $storage)
    {
        $storage->delete($blobName, $blobFolderName);
        return $this->redirectToRoute('app_employees_edit', ['id' => $employeeId]);
    }
}
