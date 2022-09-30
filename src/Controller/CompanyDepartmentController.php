<?php

namespace App\Controller;

use App\Entity\CompanyDepartment;
use App\Form\CompanyDepartmentType;
use App\Repository\CompanyDepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/company/department')]
class CompanyDepartmentController extends AbstractController
{
    #[Route('/', name: 'app_company_department_index', methods: ['GET'])]
    public function index(CompanyDepartmentRepository $companyDepartmentRepository): Response
    {
        return $this->render('company_department/index.html.twig', [
            'company_departments' => $companyDepartmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_company_department_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CompanyDepartmentRepository $companyDepartmentRepository): Response
    {
        $companyDepartment = new CompanyDepartment();
        $form = $this->createForm(CompanyDepartmentType::class, $companyDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyDepartmentRepository->add($companyDepartment, true);

            return $this->redirectToRoute('app_company_department_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_department/new.html.twig', [
            'company_department' => $companyDepartment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_department_show', methods: ['GET'])]
    public function show(CompanyDepartment $companyDepartment): Response
    {
        return $this->render('company_department/show.html.twig', [
            'company_department' => $companyDepartment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_company_department_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CompanyDepartment $companyDepartment, CompanyDepartmentRepository $companyDepartmentRepository): Response
    {
        $form = $this->createForm(CompanyDepartmentType::class, $companyDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyDepartmentRepository->add($companyDepartment, true);

            return $this->redirectToRoute('app_company_department_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('company_department/edit.html.twig', [
            'company_department' => $companyDepartment,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_company_department_delete', methods: ['POST'])]
    public function delete(Request $request, CompanyDepartment $companyDepartment, CompanyDepartmentRepository $companyDepartmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyDepartment->getId(), $request->request->get('_token'))) {
            $companyDepartmentRepository->remove($companyDepartment, true);
        }

        return $this->redirectToRoute('app_company_department_index', [], Response::HTTP_SEE_OTHER);
    }
}
