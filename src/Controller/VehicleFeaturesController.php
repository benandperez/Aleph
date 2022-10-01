<?php

namespace App\Controller;

use App\Entity\VehicleFeatures;
use App\Form\VehicleFeaturesType;
use App\Repository\VehicleFeaturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vehicle/features')]
class VehicleFeaturesController extends AbstractController
{
    #[Route('/', name: 'app_vehicle_features_index', methods: ['GET'])]
    public function index(VehicleFeaturesRepository $vehicleFeaturesRepository): Response
    {
        return $this->render('vehicle_features/index.html.twig', [
            'vehicle_features' => $vehicleFeaturesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vehicle_features_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VehicleFeaturesRepository $vehicleFeaturesRepository): Response
    {
        $vehicleFeature = new VehicleFeatures();
        $form = $this->createForm(VehicleFeaturesType::class, $vehicleFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleFeaturesRepository->add($vehicleFeature, true);

            return $this->redirectToRoute('app_vehicle_features_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle_features/new.html.twig', [
            'vehicle_feature' => $vehicleFeature,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicle_features_show', methods: ['GET'])]
    public function show(VehicleFeatures $vehicleFeature): Response
    {
        return $this->render('vehicle_features/show.html.twig', [
            'vehicle_feature' => $vehicleFeature,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vehicle_features_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VehicleFeatures $vehicleFeature, VehicleFeaturesRepository $vehicleFeaturesRepository): Response
    {
        $form = $this->createForm(VehicleFeaturesType::class, $vehicleFeature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicleFeaturesRepository->add($vehicleFeature, true);

            return $this->redirectToRoute('app_vehicle_features_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vehicle_features/edit.html.twig', [
            'vehicle_feature' => $vehicleFeature,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicle_features_delete', methods: ['POST'])]
    public function delete(Request $request, VehicleFeatures $vehicleFeature, VehicleFeaturesRepository $vehicleFeaturesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicleFeature->getId(), $request->request->get('_token'))) {
            $vehicleFeaturesRepository->remove($vehicleFeature, true);
        }

        return $this->redirectToRoute('app_vehicle_features_index', [], Response::HTTP_SEE_OTHER);
    }
}
