<?php

namespace App\Controller;

use App\Entity\AchievedGoals;
use App\Form\AchievedGoalsType;
use App\Repository\AchievedGoalsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/achieved/goals')]
class AchievedGoalsController extends AbstractController
{
    #[Route('/', name: 'app_achieved_goals_index', methods: ['GET'])]
    public function index(AchievedGoalsRepository $achievedGoalsRepository): Response
    {
        return $this->render('achieved_goals/index.html.twig', [
            'achieved_goals' => $achievedGoalsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_achieved_goals_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AchievedGoalsRepository $achievedGoalsRepository): Response
    {
        $achievedGoal = new AchievedGoals();
        $form = $this->createForm(AchievedGoalsType::class, $achievedGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achievedGoalsRepository->save($achievedGoal, true);

            return $this->redirectToRoute('app_achieved_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('achieved_goals/new.html.twig', [
            'achieved_goal' => $achievedGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_achieved_goals_show', methods: ['GET'])]
    public function show(AchievedGoals $achievedGoal): Response
    {
        return $this->render('achieved_goals/show.html.twig', [
            'achieved_goal' => $achievedGoal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_achieved_goals_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AchievedGoals $achievedGoal, AchievedGoalsRepository $achievedGoalsRepository): Response
    {
        $form = $this->createForm(AchievedGoalsType::class, $achievedGoal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $achievedGoalsRepository->save($achievedGoal, true);

            return $this->redirectToRoute('app_achieved_goals_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('achieved_goals/edit.html.twig', [
            'achieved_goal' => $achievedGoal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_achieved_goals_delete', methods: ['POST'])]
    public function delete(Request $request, AchievedGoals $achievedGoal, AchievedGoalsRepository $achievedGoalsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$achievedGoal->getId(), $request->request->get('_token'))) {
            $achievedGoalsRepository->remove($achievedGoal, true);
        }

        return $this->redirectToRoute('app_achieved_goals_index', [], Response::HTTP_SEE_OTHER);
    }
}
