<?php

namespace App\Controller;

use App\Entity\StudiesCurrently;
use App\Form\StudiesCurrentlyType;
use App\Repository\StudiesCurrentlyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/studies/currently')]
class StudiesCurrentlyController extends AbstractController
{
    #[Route('/', name: 'app_studies_currently_index', methods: ['GET'])]
    public function index(StudiesCurrentlyRepository $studiesCurrentlyRepository): Response
    {
        return $this->render('studies_currently/index.html.twig', [
            'studies_currentlies' => $studiesCurrentlyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_studies_currently_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StudiesCurrentlyRepository $studiesCurrentlyRepository): Response
    {
        $studiesCurrently = new StudiesCurrently();
        $form = $this->createForm(StudiesCurrentlyType::class, $studiesCurrently);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studiesCurrentlyRepository->add($studiesCurrently, true);

            return $this->redirectToRoute('app_studies_currently_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('studies_currently/new.html.twig', [
            'studies_currently' => $studiesCurrently,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_studies_currently_show', methods: ['GET'])]
    public function show(StudiesCurrently $studiesCurrently): Response
    {
        return $this->render('studies_currently/show.html.twig', [
            'studies_currently' => $studiesCurrently,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_studies_currently_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StudiesCurrently $studiesCurrently, StudiesCurrentlyRepository $studiesCurrentlyRepository): Response
    {
        $form = $this->createForm(StudiesCurrentlyType::class, $studiesCurrently);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $studiesCurrentlyRepository->add($studiesCurrently, true);

            return $this->redirectToRoute('app_studies_currently_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('studies_currently/edit.html.twig', [
            'studies_currently' => $studiesCurrently,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_studies_currently_delete', methods: ['POST'])]
    public function delete(Request $request, StudiesCurrently $studiesCurrently, StudiesCurrentlyRepository $studiesCurrentlyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$studiesCurrently->getId(), $request->request->get('_token'))) {
            $studiesCurrentlyRepository->remove($studiesCurrently, true);
        }

        return $this->redirectToRoute('app_studies_currently_index', [], Response::HTTP_SEE_OTHER);
    }
}
