<?php

namespace App\Controller;

use App\Entity\VehicleTypes;
use App\Form\VehicleTypesType;
use App\Repository\VehicleTypesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vehicle/types')]
class VehicleTypesController extends AbstractController
{
    #[Route('/', name: 'app_vehicle_types_index', methods: ['GET'])]
    public function index(VehicleTypesRepository $vehicleTypesRepository): Response
    {
        return $this->render('vehicle_types/index.html.twig', [
            'vehicle_types' => $vehicleTypesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vehicle_types_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VehicleTypesRepository $vehicleTypesRepository): Response
    {
        $vehicleType = new VehicleTypes();
        $form = $this->createForm(VehicleTypesType::class, $vehicleType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleTypesRepository->add($vehicleType, true);

            return $this->redirectToRoute('app_vehicle_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle_types/new.html.twig', [
            'vehicle_type' => $vehicleType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicle_types_show', methods: ['GET'])]
    public function show(VehicleTypes $vehicleType): Response
    {
        return $this->render('vehicle_types/show.html.twig', [
            'vehicle_type' => $vehicleType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vehicle_types_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VehicleTypes $vehicleType, VehicleTypesRepository $vehicleTypesRepository): Response
    {
        $form = $this->createForm(VehicleTypesType::class, $vehicleType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleTypesRepository->add($vehicleType, true);

            return $this->redirectToRoute('app_vehicle_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle_types/edit.html.twig', [
            'vehicle_type' => $vehicleType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicle_types_delete', methods: ['POST'])]
    public function delete(Request $request, VehicleTypes $vehicleType, VehicleTypesRepository $vehicleTypesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicleType->getId(), $request->request->get('_token'))) {
            $vehicleTypesRepository->remove($vehicleType, true);
        }

        return $this->redirectToRoute('app_vehicle_types_index', [], Response::HTTP_SEE_OTHER);
    }
}
