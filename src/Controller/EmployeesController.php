<?php

namespace App\Controller;

use App\Entity\Employees;
use App\Entity\PersonalReferences;
use App\Form\EmployeesType;
use App\Repository\EmployeesRepository;
use App\Repository\PersonalReferencesRepository;
use App\Service\BlobService;
use PhpParser\Node\Expr\New_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    public function new(Request $request, EmployeesRepository $employeesRepository, PersonalReferencesRepository $personalReferencesRepository, SluggerInterface $slugger, BlobService $blobService): Response
    {
        $employee = new Employees();
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);

//        dd($employee, $request, $form, $form->get('imageProfile')->getData());

        if ($form->isSubmitted()) {
            $orderDate = "Y/m/d";

            $imageProfile = $form->get('imageProfile')->getData();

            if ($imageProfile) {
                $this->uploadFile($imageProfile, $employee, $slugger, $blobService);

            }

            $this->setDate($request, $employee,$orderDate, $personalReferencesRepository);
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
    public function edit(Request $request, Employees $employee, EmployeesRepository $employeesRepository, PersonalReferencesRepository $personalReferencesRepository, SluggerInterface $slugger, BlobService $blobService): Response
    {
        $form = $this->createForm(EmployeesType::class, $employee);
        $form->handleRequest($request);
        $orderDate = "d/m/Y";

        if ($form->isSubmitted()) {
            $orderDate = "Y/m/d";
            $imageProfile = $form->get('imageProfile')->getData();

            if ($imageProfile) {
                $this->uploadFile($imageProfile, $employee, $slugger, $blobService);

            }

            $this->setDate($request, $employee, $orderDate, $personalReferencesRepository);
            $employeesRepository->add($employee, true);

            return $this->redirectToRoute('app_employees_index', [], Response::HTTP_SEE_OTHER);
        }
        $this->setDate($request, $employee, $orderDate, $personalReferencesRepository);

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

    public function setDate($request, $employee, $orderDate, $personalReferencesRepository)
    {

        if (count($request->request->all()) > 0){
            $date = explode("/", $request->request->all()["employees"]["expirationDate"]);
            $dateExpirationDate = new \DateTime( date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

            $date = explode("/", $request->request->all()["employees"]["birthDay"]);
            $dateBirthDay = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

            $date = explode("/", $request->request->all()["employees"]["expirationDateLicense"]);
            $dateExpirationDateLicense = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));

            $date = explode("/", $request->request->all()["employees"]["dateJoiningCompany"]);
            $dateDateJoiningCompany = new \DateTime(date($orderDate, strtotime($date[2]."-".$date[1]."-".$date[0])));


            $employee->setExpirationDate($dateExpirationDate);
            $employee->setBirthDay($dateBirthDay);
            $employee->setExpirationDateLicense($dateExpirationDateLicense);
            $employee->setDateJoiningCompany($dateDateJoiningCompany);
            if (count($employee->getPersonalReferences()) > 0) {
                foreach ($request->request->all()["employees"]["personalReferences"] as $personalReference) {
                    $date = explode("/", $personalReference["birthDay"]);
                    $datePersonalReference = new \DateTime(date($orderDate, strtotime( $date[2]."-".$date[1]."-".$date[0] )));

                    foreach ($employee->getPersonalReferences() as $item) {
                        $item->setBirthDay($datePersonalReference);
                        $personalReferencesRepository->add($item,true);
                    }
                }
            }
        }

    }

    public function uploadFile($imageProfile, $employee, $slugger, $blobService)
    {
        $newFilename = "https://".$_ENV['ACCOUNTNAME'].".blob.core.windows.net/".$_ENV['BLOBIMAGEPROFILE']."/".$imageProfile->getClientOriginalName();

        try {

            if (empty($imageProfile)) {
                return new Response("No file specified", Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'text/plain']);
            }
            $blobService->upload($imageProfile);

        } catch (FileException $e) {
            print_r($e);
        }

        $employee->setImageProfile($newFilename);

    }
}
