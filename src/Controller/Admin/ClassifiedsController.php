<?php

namespace App\Controller\Admin;

use App\Entity\Classifieds;
use App\Form\ClassifiedsType;
use App\Repository\ClassifiedsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/classifieds")
 */
class ClassifiedsController extends AbstractController
{
    /**
     * @Route("/", name="admin_classifieds_index", methods={"GET"})
     */
    public function index(ClassifiedsRepository $classifiedsRepository): Response
    {
        return $this->render('admin/classifieds/index.html.twig', [
            'classifieds' => $classifiedsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_classifieds_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $classified = new Classifieds();
        $form = $this->createForm(ClassifiedsType::class, $classified);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($classified);
            $entityManager->flush();

            return $this->redirectToRoute('admin_classifieds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/classifieds/new.html.twig', [
            'classified' => $classified,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_classifieds_show", methods={"GET"})
     */
    public function show(Classifieds $classified): Response
    {
        return $this->render('admin/classifieds/show.html.twig', [
            'classified' => $classified,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_classifieds_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Classifieds $classified): Response
    {
        $form = $this->createForm(ClassifiedsType::class, $classified);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_classifieds_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/classifieds/edit.html.twig', [
            'classified' => $classified,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_classifieds_delete", methods={"POST"})
     */
    public function delete(Request $request, Classifieds $classified): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classified->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($classified);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_classifieds_index', [], Response::HTTP_SEE_OTHER);
    }
}
