<?php

namespace App\Controller;

use App\Entity\EducationLevel;
use App\Form\EducationLevelType;
use App\Repository\EducationLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/education/level')]
class EducationLevelController extends AbstractController
{
    #[Route('/', name: 'app_education_level_index', methods: ['GET'])]
    public function index(EducationLevelRepository $educationLevelRepository): Response
    {
        return $this->render('education_level/index.html.twig', [
            'education_levels' => $educationLevelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_education_level_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EducationLevelRepository $educationLevelRepository): Response
    {
        $educationLevel = new EducationLevel();
        $form = $this->createForm(EducationLevelType::class, $educationLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $educationLevelRepository->add($educationLevel, true);

            return $this->redirectToRoute('app_education_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('education_level/new.html.twig', [
            'education_level' => $educationLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_level_show', methods: ['GET'])]
    public function show(EducationLevel $educationLevel): Response
    {
        return $this->render('education_level/show.html.twig', [
            'education_level' => $educationLevel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_education_level_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EducationLevel $educationLevel, EducationLevelRepository $educationLevelRepository): Response
    {
        $form = $this->createForm(EducationLevelType::class, $educationLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $educationLevelRepository->add($educationLevel, true);

            return $this->redirectToRoute('app_education_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('education_level/edit.html.twig', [
            'education_level' => $educationLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_education_level_delete', methods: ['POST'])]
    public function delete(Request $request, EducationLevel $educationLevel, EducationLevelRepository $educationLevelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educationLevel->getId(), $request->request->get('_token'))) {
            $educationLevelRepository->remove($educationLevel, true);
        }

        return $this->redirectToRoute('app_education_level_index', [], Response::HTTP_SEE_OTHER);
    }
}
