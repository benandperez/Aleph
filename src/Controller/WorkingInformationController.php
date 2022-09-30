<?php

namespace App\Controller;

use App\Entity\WorkingInformation;
use App\Form\WorkingInformationType;
use App\Repository\WorkingInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/working/information')]
class WorkingInformationController extends AbstractController
{
    #[Route('/', name: 'app_working_information_index', methods: ['GET'])]
    public function index(WorkingInformationRepository $workingInformationRepository): Response
    {
        return $this->render('working_information/index.html.twig', [
            'working_informations' => $workingInformationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_working_information_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WorkingInformationRepository $workingInformationRepository): Response
    {
        $workingInformation = new WorkingInformation();
        $form = $this->createForm(WorkingInformationType::class, $workingInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workingInformationRepository->add($workingInformation, true);

            return $this->redirectToRoute('app_working_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('working_information/new.html.twig', [
            'working_information' => $workingInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_working_information_show', methods: ['GET'])]
    public function show(WorkingInformation $workingInformation): Response
    {
        return $this->render('working_information/show.html.twig', [
            'working_information' => $workingInformation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_working_information_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WorkingInformation $workingInformation, WorkingInformationRepository $workingInformationRepository): Response
    {
        $form = $this->createForm(WorkingInformationType::class, $workingInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workingInformationRepository->add($workingInformation, true);

            return $this->redirectToRoute('app_working_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('working_information/edit.html.twig', [
            'working_information' => $workingInformation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_working_information_delete', methods: ['POST'])]
    public function delete(Request $request, WorkingInformation $workingInformation, WorkingInformationRepository $workingInformationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workingInformation->getId(), $request->request->get('_token'))) {
            $workingInformationRepository->remove($workingInformation, true);
        }

        return $this->redirectToRoute('app_working_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
