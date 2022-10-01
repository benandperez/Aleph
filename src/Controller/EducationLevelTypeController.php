<?php

namespace App\Controller;

use App\Entity\EducationLevelType;
use App\Form\EducationLevelTypeType;
use App\Repository\EducationLevelTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/education/level/type')]
class EducationLevelTypeController extends AbstractController
{
    #[Route('/', name: 'app_education_level_type_index', methods: ['GET'])]
    public function index(EducationLevelTypeRepository $educationLevelTypeRepository): Response
    {
        return $this->render('education_level_type/index.html.twig', [
            'education_level_types' => $educationLevelTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_education_level_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EducationLevelTypeRepository $educationLevelTypeRepository): Response
    {
        $educationLevelType = new EducationLevelType();
        $form = $this->createForm(EducationLevelTypeType::class, $educationLevelType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $educationLevelTypeRepository->add($educationLevelType, true);

            return $this->redirectToRoute('app_education_level_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('education_level_type/new.html.twig', [
            'education_level_type' => $educationLevelType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_level_type_show', methods: ['GET'])]
    public function show(EducationLevelType $educationLevelType): Response
    {
        return $this->render('education_level_type/show.html.twig', [
            'education_level_type' => $educationLevelType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_education_level_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EducationLevelType $educationLevelType, EducationLevelTypeRepository $educationLevelTypeRepository): Response
    {
        $form = $this->createForm(EducationLevelTypeType::class, $educationLevelType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $educationLevelTypeRepository->add($educationLevelType, true);

            return $this->redirectToRoute('app_education_level_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('education_level_type/edit.html.twig', [
            'education_level_type' => $educationLevelType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_level_type_delete', methods: ['POST'])]
    public function delete(Request $request, EducationLevelType $educationLevelType, EducationLevelTypeRepository $educationLevelTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educationLevelType->getId(), $request->request->get('_token'))) {
            $educationLevelTypeRepository->remove($educationLevelType, true);
        }

        return $this->redirectToRoute('app_education_level_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
