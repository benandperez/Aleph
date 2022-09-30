<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Entity\PersonalReferences;
use App\Form\EmployeesType;
use App\Repository\EmployeesRepository;
use App\Repository\PersonalReferencesRepository;
use PhpParser\Node\Expr\New_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employees')]
class EmployeesController extends AbstractController
{
    #[Route('/', name: 'app_employees_index', methods: ['GET'])]
    public function index(EmployeesRepository $employeesRepository): Response
    {
        return $this->render('employees/index.html.twig', [
            'employees' => $employeesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_employees_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeesRepository $employeesRepository, PersonalReferencesRepository $personalReferencesRepository): Response
    {
        $employee = new Employees();
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            foreach ($employee->getPersonalReferences() as $item) {
////                dump($item);
////               $personalReference = new PersonalReferences($item);
////               $personalReference->setName($item->getName());
////               $personalReference->setBirthDay($item->getBirthDay());
////
//////                $personalReference =  $personalReferencesRepository->add($item,true);
////                dd($personalReference);
//                $employee->addPersonalReference($item);
//
//            }
//            dump($employee->getPersonalReferences());
//            dd($request->request);
//            $employee->addPersonalReference()
            $employeesRepository->add($employee, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employees_show', methods: ['GET'])]
    public function show(Employees $employee): Response
    {
        return $this->render('employees/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employees_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employees $employee, EmployeesRepository $employeesRepository): Response
    {
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $employeesRepository->add($employee, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employees/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employees_delete', methods: ['POST'])]
    public function delete(Request $request, Employees $employee, EmployeesRepository $employeesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employee->getId(), $request->request->get('_token'))) {
            $employeesRepository->remove($employee, true);
        }

        return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
    }
}
