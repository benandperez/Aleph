<?php

namespace App\Controller;

use App\Entity\LanguageLevel;
use App\Form\LanguageLevelType;
use App\Repository\LanguageLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/language/level')]
class LanguageLevelController extends AbstractController
{
    #[Route('/', name: 'app_language_level_index', methods: ['GET'])]
    public function index(LanguageLevelRepository $languageLevelRepository): Response
    {
        return $this->render('language_level/index.html.twig', [
            'language_levels' => $languageLevelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_language_level_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LanguageLevelRepository $languageLevelRepository): Response
    {
        $languageLevel = new LanguageLevel();
        $form = $this->createForm(LanguageLevelType::class, $languageLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $languageLevelRepository->add($languageLevel, true);

            return $this->redirectToRoute('app_language_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('language_level/new.html.twig', [
            'language_level' => $languageLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_language_level_show', methods: ['GET'])]
    public function show(LanguageLevel $languageLevel): Response
    {
        return $this->render('language_level/show.html.twig', [
            'language_level' => $languageLevel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_language_level_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LanguageLevel $languageLevel, LanguageLevelRepository $languageLevelRepository): Response
    {
        $form = $this->createForm(LanguageLevelType::class, $languageLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $languageLevelRepository->add($languageLevel, true);

            return $this->redirectToRoute('app_language_level_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('language_level/edit.html.twig', [
            'language_level' => $languageLevel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_language_level_delete', methods: ['POST'])]
    public function delete(Request $request, LanguageLevel $languageLevel, LanguageLevelRepository $languageLevelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$languageLevel->getId(), $request->request->get('_token'))) {
            $languageLevelRepository->remove($languageLevel, true);
        }

        return $this->redirectToRoute('app_language_level_index', [], Response::HTTP_SEE_OTHER);
    }
}
