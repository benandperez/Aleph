<?php

namespace App\Controller;

use App\Entity\FinancialProfile;
use App\Form\FinancialProfileType;
use App\Repository\FinancialProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/financial/profile')]
class FinancialProfileController extends AbstractController
{
    #[Route('/', name: 'app_financial_profile_index', methods: ['GET'])]
    public function index(FinancialProfileRepository $financialProfileRepository): Response
    {
        return $this->render('financial_profile/index.html.twig', [
            'financial_profiles' => $financialProfileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_financial_profile_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FinancialProfileRepository $financialProfileRepository): Response
    {
        $financialProfile = new FinancialProfile();
        $form = $this->createForm(FinancialProfileType::class, $financialProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $financialProfileRepository->add($financialProfile, true);

            return $this->redirectToRoute('app_financial_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('financial_profile/new.html.twig', [
            'financial_profile' => $financialProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_financial_profile_show', methods: ['GET'])]
    public function show(FinancialProfile $financialProfile): Response
    {
        return $this->render('financial_profile/show.html.twig', [
            'financial_profile' => $financialProfile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_financial_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FinancialProfile $financialProfile, FinancialProfileRepository $financialProfileRepository): Response
    {
        $form = $this->createForm(FinancialProfileType::class, $financialProfile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $financialProfileRepository->add($financialProfile, true);

            return $this->redirectToRoute('app_financial_profile_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('financial_profile/edit.html.twig', [
            'financial_profile' => $financialProfile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_financial_profile_delete', methods: ['POST'])]
    public function delete(Request $request, FinancialProfile $financialProfile, FinancialProfileRepository $financialProfileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$financialProfile->getId(), $request->request->get('_token'))) {
            $financialProfileRepository->remove($financialProfile, true);
        }

        return $this->redirectToRoute('app_financial_profile_index', [], Response::HTTP_SEE_OTHER);
    }
}
