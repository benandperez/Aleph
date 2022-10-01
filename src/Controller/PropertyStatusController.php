<?php

namespace App\Controller;

use App\Entity\PropertyStatus;
use App\Form\PropertyStatusType;
use App\Repository\PropertyStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/property/status')]
class PropertyStatusController extends AbstractController
{
    #[Route('/', name: 'app_property_status_index', methods: ['GET'])]
    public function index(PropertyStatusRepository $propertyStatusRepository): Response
    {
        return $this->render('property_status/index.html.twig', [
            'property_statuses' => $propertyStatusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_property_status_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PropertyStatusRepository $propertyStatusRepository): Response
    {
        $propertyStatus = new PropertyStatus();
        $form = $this->createForm(PropertyStatusType::class, $propertyStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $propertyStatusRepository->add($propertyStatus, true);

            return $this->redirectToRoute('app_property_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('property_status/new.html.twig', [
            'property_status' => $propertyStatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_property_status_show', methods: ['GET'])]
    public function show(PropertyStatus $propertyStatus): Response
    {
        return $this->render('property_status/show.html.twig', [
            'property_status' => $propertyStatus,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_property_status_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PropertyStatus $propertyStatus, PropertyStatusRepository $propertyStatusRepository): Response
    {
        $form = $this->createForm(PropertyStatusType::class, $propertyStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $propertyStatusRepository->add($propertyStatus, true);

            return $this->redirectToRoute('app_property_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('property_status/edit.html.twig', [
            'property_status' => $propertyStatus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_property_status_delete', methods: ['POST'])]
    public function delete(Request $request, PropertyStatus $propertyStatus, PropertyStatusRepository $propertyStatusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$propertyStatus->getId(), $request->request->get('_token'))) {
            $propertyStatusRepository->remove($propertyStatus, true);
        }

        return $this->redirectToRoute('app_property_status_index', [], Response::HTTP_SEE_OTHER);
    }
}
