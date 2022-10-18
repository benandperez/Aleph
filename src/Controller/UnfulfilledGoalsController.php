<?php

namespace App\Controller;

use App\Entity\UnfulfilledGoals;
use App\Form\UnfulfilledGoalsType;
use App\Repository\UnfulfilledGoalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/unfulfilled/goals')]
class UnfulfilledGoalsController extends AbstractController
{
    #[Route('/', name: 'app_unfulfilled_goals_index', methods: ['GET'])]
    public function index(UnfulfilledGoalsRepository $unfulfilledGoalsRepository): Response
    {
        return $this->render('unfulfilled_goals/index.html.twig', [
            'unfulfilled_goals' => $unfulfilledGoalsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_unfulfilled_goals_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UnfulfilledGoalsRepository $unfulfilledGoalsRepository): Response
    {
        $unfulfilledGoal = new UnfulfilledGoals();
        $form = $this->createForm(UnfulfilledGoalsType::class, $unfulfilledGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $unfulfilledGoalsRepository->save($unfulfilledGoal, true);

            return $this->redirectToRoute('app_unfulfilled_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('unfulfilled_goals/new.html.twig', [
            'unfulfilled_goal' => $unfulfilledGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unfulfilled_goals_show', methods: ['GET'])]
    public function show(UnfulfilledGoals $unfulfilledGoal): Response
    {
        return $this->render('unfulfilled_goals/show.html.twig', [
            'unfulfilled_goal' => $unfulfilledGoal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_unfulfilled_goals_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UnfulfilledGoals $unfulfilledGoal, UnfulfilledGoalsRepository $unfulfilledGoalsRepository): Response
    {
        $form = $this->createForm(UnfulfilledGoalsType::class, $unfulfilledGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $unfulfilledGoalsRepository->save($unfulfilledGoal, true);

            return $this->redirectToRoute('app_unfulfilled_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('unfulfilled_goals/edit.html.twig', [
            'unfulfilled_goal' => $unfulfilledGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_unfulfilled_goals_delete', methods: ['POST'])]
    public function delete(Request $request, UnfulfilledGoals $unfulfilledGoal, UnfulfilledGoalsRepository $unfulfilledGoalsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$unfulfilledGoal->getId(), $request->request->get('_token'))) {
            $unfulfilledGoalsRepository->remove($unfulfilledGoal, true);
        }

        return $this->redirectToRoute('app_unfulfilled_goals_index', [], Response::HTTP_SEE_OTHER);
    }
}
