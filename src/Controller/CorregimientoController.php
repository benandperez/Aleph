<?php

namespace App\Controller;

use App\Entity\Corregimiento;
use App\Form\CorregimientoType;
use App\Repository\CorregimientoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/corregimiento')]
class CorregimientoController extends AbstractController
{
    #[Route('/', name: 'app_corregimiento_index', methods: ['GET'])]
    public function index(CorregimientoRepository $corregimientoRepository): Response
    {
        return $this->render('corregimiento/index.html.twig', [
            'corregimientos' => $corregimientoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_corregimiento_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CorregimientoRepository $corregimientoRepository): Response
    {
        $corregimiento = new Corregimiento();
        $form = $this->createForm(CorregimientoType::class, $corregimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $corregimientoRepository->add($corregimiento, true);

            return $this->redirectToRoute('app_corregimiento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('corregimiento/new.html.twig', [
            'corregimiento' => $corregimiento,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_corregimiento_show', methods: ['GET'])]
    public function show(Corregimiento $corregimiento): Response
    {
        return $this->render('corregimiento/show.html.twig', [
            'corregimiento' => $corregimiento,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_corregimiento_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Corregimiento $corregimiento, CorregimientoRepository $corregimientoRepository): Response
    {
        $form = $this->createForm(CorregimientoType::class, $corregimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $corregimientoRepository->add($corregimiento, true);

            return $this->redirectToRoute('app_corregimiento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('corregimiento/edit.html.twig', [
            'corregimiento' => $corregimiento,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_corregimiento_delete', methods: ['POST'])]
    public function delete(Request $request, Corregimiento $corregimiento, CorregimientoRepository $corregimientoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$corregimiento->getId(), $request->request->get('_token'))) {
            $corregimientoRepository->remove($corregimiento, true);
        }

        return $this->redirectToRoute('app_corregimiento_index', [], Response::HTTP_SEE_OTHER);
    }
}
