<?php

namespace App\Controller;

use App\Entity\PlaceWork;
use App\Form\PlaceWorkType;
use App\Repository\PlaceWorkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/place/work')]
class PlaceWorkController extends AbstractController
{
    #[Route('/', name: 'app_place_work_index', methods: ['GET'])]
    public function index(PlaceWorkRepository $placeWorkRepository): Response
    {
        return $this->render('place_work/index.html.twig', [
            'place_works' => $placeWorkRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_place_work_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PlaceWorkRepository $placeWorkRepository): Response
    {
        $placeWork = new PlaceWork();
        $form = $this->createForm(PlaceWorkType::class, $placeWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $placeWorkRepository->add($placeWork, true);

            return $this->redirectToRoute('app_place_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('place_work/new.html.twig', [
            'place_work' => $placeWork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_place_work_show', methods: ['GET'])]
    public function show(PlaceWork $placeWork): Response
    {
        return $this->render('place_work/show.html.twig', [
            'place_work' => $placeWork,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_place_work_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PlaceWork $placeWork, PlaceWorkRepository $placeWorkRepository): Response
    {
        $form = $this->createForm(PlaceWorkType::class, $placeWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $placeWorkRepository->add($placeWork, true);

            return $this->redirectToRoute('app_place_work_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('place_work/edit.html.twig', [
            'place_work' => $placeWork,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_place_work_delete', methods: ['POST'])]
    public function delete(Request $request, PlaceWork $placeWork, PlaceWorkRepository $placeWorkRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$placeWork->getId(), $request->request->get('_token'))) {
            $placeWorkRepository->remove($placeWork, true);
        }

        return $this->redirectToRoute('app_place_work_index', [], Response::HTTP_SEE_OTHER);
    }
}
