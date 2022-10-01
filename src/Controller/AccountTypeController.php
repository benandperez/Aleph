<?php

namespace App\Controller;

use App\Entity\AccountType;
use App\Form\AccountTypeType;
use App\Repository\AccountTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/account/type')]
class AccountTypeController extends AbstractController
{
    #[Route('/', name: 'app_account_type_index', methods: ['GET'])]
    public function index(AccountTypeRepository $accountTypeRepository): Response
    {
        return $this->render('account_type/index.html.twig', [
            'account_types' => $accountTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_account_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AccountTypeRepository $accountTypeRepository): Response
    {
        $accountType = new AccountType();
        $form = $this->createForm(AccountTypeType::class, $accountType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accountTypeRepository->add($accountType, true);

            return $this->redirectToRoute('app_account_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account_type/new.html.twig', [
            'account_type' => $accountType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_account_type_show', methods: ['GET'])]
    public function show(AccountType $accountType): Response
    {
        return $this->render('account_type/show.html.twig', [
            'account_type' => $accountType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_account_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AccountType $accountType, AccountTypeRepository $accountTypeRepository): Response
    {
        $form = $this->createForm(AccountTypeType::class, $accountType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accountTypeRepository->add($accountType, true);

            return $this->redirectToRoute('app_account_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('account_type/edit.html.twig', [
            'account_type' => $accountType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_account_type_delete', methods: ['POST'])]
    public function delete(Request $request, AccountType $accountType, AccountTypeRepository $accountTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accountType->getId(), $request->request->get('_token'))) {
            $accountTypeRepository->remove($accountType, true);
        }

        return $this->redirectToRoute('app_account_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
