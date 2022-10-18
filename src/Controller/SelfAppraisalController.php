<?php

namespace App\Controller;

use App\Entity\SelfAppraisal;
use App\Form\SelfAppraisalType;
use App\Repository\SelfAppraisalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/self/appraisal')]
class SelfAppraisalController extends AbstractController
{
    private Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[Route('/', name: 'app_self_appraisal_index', methods: ['GET'])]
    public function index(SelfAppraisalRepository $selfAppraisalRepository): Response
    {
        $user = $this->security->getUser();
//        dd($user);
        return $this->render('self_appraisal/index.html.twig', [
            'self_appraisals' => $selfAppraisalRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_self_appraisal_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SelfAppraisalRepository $selfAppraisalRepository): Response
    {
        $selfAppraisal = new SelfAppraisal();
        $form = $this->createForm(SelfAppraisalType::class, $selfAppraisal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selfAppraisalRepository->save($selfAppraisal, true);

            return $this->redirectToRoute('app_self_appraisal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('self_appraisal/new.html.twig', [
            'self_appraisal' => $selfAppraisal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_self_appraisal_show', methods: ['GET'])]
    public function show(SelfAppraisal $selfAppraisal): Response
    {
        return $this->render('self_appraisal/show.html.twig', [
            'self_appraisal' => $selfAppraisal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_self_appraisal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SelfAppraisal $selfAppraisal, SelfAppraisalRepository $selfAppraisalRepository): Response
    {
        $form = $this->createForm(SelfAppraisalType::class, $selfAppraisal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selfAppraisalRepository->save($selfAppraisal, true);

            return $this->redirectToRoute('app_self_appraisal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('self_appraisal/edit.html.twig', [
            'self_appraisal' => $selfAppraisal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_self_appraisal_delete', methods: ['POST'])]
    public function delete(Request $request, SelfAppraisal $selfAppraisal, SelfAppraisalRepository $selfAppraisalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$selfAppraisal->getId(), $request->request->get('_token'))) {
            $selfAppraisalRepository->remove($selfAppraisal, true);
        }

        return $this->redirectToRoute('app_self_appraisal_index', [], Response::HTTP_SEE_OTHER);
    }
}
