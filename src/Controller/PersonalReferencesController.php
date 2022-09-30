<?php

namespace App\Controller;

use App\Entity\PersonalReferences;
use App\Form\PersonalReferencesType;
use App\Repository\PersonalReferencesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personal/references')]
class PersonalReferencesController extends AbstractController
{
    #[Route('/', name: 'app_personal_references_index', methods: ['GET'])]
    public function index(PersonalReferencesRepository $personalReferencesRepository): Response
    {
        return $this->render('personal_references/index.html.twig', [
            'personal_references' => $personalReferencesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_personal_references_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PersonalReferencesRepository $personalReferencesRepository): Response
    {
        $personalReference = new PersonalReferences();
        $form = $this->createForm(PersonalReferencesType::class, $personalReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personalReferencesRepository->add($personalReference, true);

            return $this->redirectToRoute('app_personal_references_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personal_references/new.html.twig', [
            'personal_reference' => $personalReference,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personal_references_show', methods: ['GET'])]
    public function show(PersonalReferences $personalReference): Response
    {
        return $this->render('personal_references/show.html.twig', [
            'personal_reference' => $personalReference,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_personal_references_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PersonalReferences $personalReference, PersonalReferencesRepository $personalReferencesRepository): Response
    {
        $form = $this->createForm(PersonalReferencesType::class, $personalReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personalReferencesRepository->add($personalReference, true);

            return $this->redirectToRoute('app_personal_references_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personal_references/edit.html.twig', [
            'personal_reference' => $personalReference,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_personal_references_delete', methods: ['POST'])]
    public function delete(Request $request, PersonalReferences $personalReference, PersonalReferencesRepository $personalReferencesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personalReference->getId(), $request->request->get('_token'))) {
            $personalReferencesRepository->remove($personalReference, true);
        }

        return $this->redirectToRoute('app_personal_references_index', [], Response::HTTP_SEE_OTHER);
    }
}
