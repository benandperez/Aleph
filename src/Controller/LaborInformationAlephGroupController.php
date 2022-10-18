<?php

namespace App\Controller;

use App\Entity\LaborInformationAlephGroup;
use App\Form\LaborInformationAlephGroupType;
use App\Repository\LaborInformationAlephGroupRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/labor/information/aleph/group')]
class LaborInformationAlephGroupController extends AbstractController
{
    #[Route('/', name: 'app_labor_information_aleph_group_index', methods: ['GET'])]
    public function index(LaborInformationAlephGroupRepository $laborInformationAlephGroupRepository): Response
    {
        return $this->render('labor_information_aleph_group/index.html.twig', [
            'labor_information_aleph_groups' => $laborInformationAlephGroupRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_labor_information_aleph_group_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LaborInformationAlephGroupRepository $laborInformationAlephGroupRepository): Response
    {
        $laborInformationAlephGroup = new LaborInformationAlephGroup();
        $form = $this->createForm(LaborInformationAlephGroupType::class, $laborInformationAlephGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $laborInformationAlephGroupRepository->save($laborInformationAlephGroup, true);

            return $this->redirectToRoute('app_labor_information_aleph_group_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('labor_information_aleph_group/new.html.twig', [
            'labor_information_aleph_group' => $laborInformationAlephGroup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_labor_information_aleph_group_show', methods: ['GET'])]
    public function show(LaborInformationAlephGroup $laborInformationAlephGroup): Response
    {
        return $this->render('labor_information_aleph_group/show.html.twig', [
            'labor_information_aleph_group' => $laborInformationAlephGroup,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_labor_information_aleph_group_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LaborInformationAlephGroup $laborInformationAlephGroup, LaborInformationAlephGroupRepository $laborInformationAlephGroupRepository): Response
    {
        $form = $this->createForm(LaborInformationAlephGroupType::class, $laborInformationAlephGroup);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $laborInformationAlephGroupRepository->save($laborInformationAlephGroup, true);

            return $this->redirectToRoute('app_labor_information_aleph_group_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('labor_information_aleph_group/edit.html.twig', [
            'labor_information_aleph_group' => $laborInformationAlephGroup,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_labor_information_aleph_group_delete', methods: ['POST'])]
    public function delete(Request $request, LaborInformationAlephGroup $laborInformationAlephGroup, LaborInformationAlephGroupRepository $laborInformationAlephGroupRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laborInformationAlephGroup->getId(), $request->request->get('_token'))) {
            $laborInformationAlephGroupRepository->remove($laborInformationAlephGroup, true);
        }

        return $this->redirectToRoute('app_labor_information_aleph_group_index', [], Response::HTTP_SEE_OTHER);
    }
}
