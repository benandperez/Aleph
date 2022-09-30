<?php

namespace App\Controller;

use App\Entity\LicenseType;
use App\Form\LicenseTypeType;
use App\Repository\LicenseTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/license/type')]
class LicenseTypeController extends AbstractController
{
    #[Route('/', name: 'app_license_type_index', methods: ['GET'])]
    public function index(LicenseTypeRepository $licenseTypeRepository): Response
    {
        return $this->render('license_type/index.html.twig', [
            'license_types' => $licenseTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_license_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LicenseTypeRepository $licenseTypeRepository): Response
    {
        $licenseType = new LicenseType();
        $form = $this->createForm(LicenseTypeType::class, $licenseType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $licenseTypeRepository->add($licenseType, true);

            return $this->redirectToRoute('app_license_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('license_type/new.html.twig', [
            'license_type' => $licenseType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_license_type_show', methods: ['GET'])]
    public function show(LicenseType $licenseType): Response
    {
        return $this->render('license_type/show.html.twig', [
            'license_type' => $licenseType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_license_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LicenseType $licenseType, LicenseTypeRepository $licenseTypeRepository): Response
    {
        $form = $this->createForm(LicenseTypeType::class, $licenseType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $licenseTypeRepository->add($licenseType, true);

            return $this->redirectToRoute('app_license_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('license_type/edit.html.twig', [
            'license_type' => $licenseType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_license_type_delete', methods: ['POST'])]
    public function delete(Request $request, LicenseType $licenseType, LicenseTypeRepository $licenseTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$licenseType->getId(), $request->request->get('_token'))) {
            $licenseTypeRepository->remove($licenseType, true);
        }

        return $this->redirectToRoute('app_license_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
