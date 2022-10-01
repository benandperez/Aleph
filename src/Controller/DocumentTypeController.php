<?php

namespace App\Controller;

use App\Entity\DocumentType;
use App\Form\DocumentTypeType;
use App\Repository\DocumentTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/document/type')]
class DocumentTypeController extends AbstractController
{
    #[Route('/', name: 'app_document_type_index', methods: ['GET'])]
    public function index(DocumentTypeRepository $documentTypeRepository): Response
    {
        return $this->render('document_type/index.html.twig', [
            'document_types' => $documentTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_document_type_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DocumentTypeRepository $documentTypeRepository): Response
    {
        $documentType = new DocumentType();
        $form = $this->createForm(DocumentTypeType::class, $documentType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentTypeRepository->add($documentType, true);

            return $this->redirectToRoute('app_document_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('document_type/new.html.twig', [
            'document_type' => $documentType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_document_type_show', methods: ['GET'])]
    public function show(DocumentType $documentType): Response
    {
        return $this->render('document_type/show.html.twig', [
            'document_type' => $documentType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_document_type_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DocumentType $documentType, DocumentTypeRepository $documentTypeRepository): Response
    {
        $form = $this->createForm(DocumentTypeType::class, $documentType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentTypeRepository->add($documentType, true);

            return $this->redirectToRoute('app_document_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('document_type/edit.html.twig', [
            'document_type' => $documentType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_document_type_delete', methods: ['POST'])]
    public function delete(Request $request, DocumentType $documentType, DocumentTypeRepository $documentTypeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$documentType->getId(), $request->request->get('_token'))) {
            $documentTypeRepository->remove($documentType, true);
        }

        return $this->redirectToRoute('app_document_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
