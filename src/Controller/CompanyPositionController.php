<?php

namespace App\Controller;

use App\Entity\CompanyPosition;
use App\Form\CompanyPositionType;
use App\Repository\CompanyPositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/company/position')]
class CompanyPositionController extends AbstractController
{
    #[Route('/', name: 'app_company_position_index', methods: ['GET'])]
    public function index(CompanyPositionRepository $companyPositionRepository): Response
    {
        return $this->render('company_position/index.html.twig', [
            'company_positions' => $companyPositionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_company_position_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CompanyPositionRepository $companyPositionRepository): Response
    {
        $companyPosition = new CompanyPosition();
        $form = $this->createForm(CompanyPositionType::class, $companyPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyPositionRepository->add($companyPosition, true);

            return $this->redirectToRoute('app_company_position_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_position/new.html.twig', [
            'company_position' => $companyPosition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_position_show', methods: ['GET'])]
    public function show(CompanyPosition $companyPosition): Response
    {
        return $this->render('company_position/show.html.twig', [
            'company_position' => $companyPosition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_company_position_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CompanyPosition $companyPosition, CompanyPositionRepository $companyPositionRepository): Response
    {
        $form = $this->createForm(CompanyPositionType::class, $companyPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyPositionRepository->add($companyPosition, true);

            return $this->redirectToRoute('app_company_position_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_position/edit.html.twig', [
            'company_position' => $companyPosition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_position_delete', methods: ['POST'])]
    public function delete(Request $request, CompanyPosition $companyPosition, CompanyPositionRepository $companyPositionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyPosition->getId(), $request->request->get('_token'))) {
            $companyPositionRepository->remove($companyPosition, true);
        }

        return $this->redirectToRoute('app_company_position_index', [], Response::HTTP_SEE_OTHER);
    }
}
