<?php

namespace App\Controller;

use App\Entity\FamilyNucleus;
use App\Form\FamilyNucleusType;
use App\Repository\FamilyNucleusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/family/nucleus')]
class FamilyNucleusController extends AbstractController
{
    #[Route('/', name: 'app_family_nucleus_index', methods: ['GET'])]
    public function index(FamilyNucleusRepository $familyNucleusRepository): Response
    {
        return $this->render('family_nucleus/index.html.twig', [
            'family_nuclei' => $familyNucleusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_family_nucleus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FamilyNucleusRepository $familyNucleusRepository): Response
    {
        $familyNucleu = new FamilyNucleus();
        $form = $this->createForm(FamilyNucleusType::class, $familyNucleu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $familyNucleusRepository->add($familyNucleu, true);

            return $this->redirectToRoute('app_family_nucleus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('family_nucleus/new.html.twig', [
            'family_nucleu' => $familyNucleu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_family_nucleus_show', methods: ['GET'])]
    public function show(FamilyNucleus $familyNucleu): Response
    {
        return $this->render('family_nucleus/show.html.twig', [
            'family_nucleu' => $familyNucleu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_family_nucleus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FamilyNucleus $familyNucleu, FamilyNucleusRepository $familyNucleusRepository): Response
    {
        $form = $this->createForm(FamilyNucleusType::class, $familyNucleu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $familyNucleusRepository->add($familyNucleu, true);

            return $this->redirectToRoute('app_family_nucleus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('family_nucleus/edit.html.twig', [
            'family_nucleu' => $familyNucleu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_family_nucleus_delete', methods: ['POST'])]
    public function delete(Request $request, FamilyNucleus $familyNucleu, FamilyNucleusRepository $familyNucleusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$familyNucleu->getId(), $request->request->get('_token'))) {
            $familyNucleusRepository->remove($familyNucleu, true);
        }

        return $this->redirectToRoute('app_family_nucleus_index', [], Response::HTTP_SEE_OTHER);
    }
}
