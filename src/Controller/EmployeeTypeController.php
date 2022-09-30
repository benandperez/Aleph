<?php

namespace App\Controller;

use App\Entity\EmployeeType;
use App\Form\EmployeeTypeType;
use App\Repository\EmployeeTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employee/type')]
class EmployeeTypeController extends AbstractController
{
    #[Route('/', name: 'app_employee_type_index', methods: ['GET'])]
    public function index(EmployeeTypeRepository $employeeTypeRepository): Response
    {
        return $this->render('employee_type/index.html.twig', [
            'employee_types' => $employeeTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employee_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeeTypeRepository $employeeTypeRepository): Response
    {
        $employeeType = new EmployeeType();
        $form = $this->createForm(EmployeeTypeType::class, $employeeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeeTypeRepository->add($employeeType, true);

            return $this->redirectToRoute('app_employee_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employee_type/new.html.twig', [
            'employee_type' => $employeeType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_type_show', methods: ['GET'])]
    public function show(EmployeeType $employeeType): Response
    {
        return $this->render('employee_type/show.html.twig', [
            'employee_type' => $employeeType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employee_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EmployeeType $employeeType, EmployeeTypeRepository $employeeTypeRepository): Response
    {
        $form = $this->createForm(EmployeeTypeType::class, $employeeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeeTypeRepository->add($employeeType, true);

            return $this->redirectToRoute('app_employee_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employee_type/edit.html.twig', [
            'employee_type' => $employeeType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employee_type_delete', methods: ['POST'])]
    public function delete(Request $request, EmployeeType $employeeType, EmployeeTypeRepository $employeeTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employeeType->getId(), $request->request->get('_token'))) {
            $employeeTypeRepository->remove($employeeType, true);
        }

        return $this->redirectToRoute('app_employee_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
