<?php

namespace App\Controller;

use App\Entity\BloodType;
use App\Form\BloodTypeType;
use App\Repository\BloodTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blood/type')]
class BloodTypeController extends AbstractController
{
    #[Route('/', name: 'app_blood_type_index', methods: ['GET'])]
    public function index(BloodTypeRepository $bloodTypeRepository): Response
    {
        return $this->render('blood_type/index.html.twig', [
            'blood_types' => $bloodTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_blood_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BloodTypeRepository $bloodTypeRepository): Response
    {
        $bloodType = new BloodType();
        $form = $this->createForm(BloodTypeType::class, $bloodType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bloodTypeRepository->add($bloodType, true);

            return $this->redirectToRoute('app_blood_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_type/new.html.twig', [
            'blood_type' => $bloodType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blood_type_show', methods: ['GET'])]
    public function show(BloodType $bloodType): Response
    {
        return $this->render('blood_type/show.html.twig', [
            'blood_type' => $bloodType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_blood_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BloodType $bloodType, BloodTypeRepository $bloodTypeRepository): Response
    {
        $form = $this->createForm(BloodTypeType::class, $bloodType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bloodTypeRepository->add($bloodType, true);

            return $this->redirectToRoute('app_blood_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('blood_type/edit.html.twig', [
            'blood_type' => $bloodType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_blood_type_delete', methods: ['POST'])]
    public function delete(Request $request, BloodType $bloodType, BloodTypeRepository $bloodTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bloodType->getId(), $request->request->get('_token'))) {
            $bloodTypeRepository->remove($bloodType, true);
        }

        return $this->redirectToRoute('app_blood_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
