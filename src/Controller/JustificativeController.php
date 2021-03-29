<?php

namespace App\Controller;

use App\Entity\Justificative;
use App\Form\JustificativeType;
use App\Repository\JustificativeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/justificative")
 */
class JustificativeController extends AbstractController
{
    /**
     * @Route("/", name="justificative_index", methods={"GET"})
     */
    public function index(JustificativeRepository $justificativeRepository): Response
    {
        return $this->render('justificative/index.html.twig', [
            'justificatives' => $justificativeRepository->findAll(),
        ]);
    }


    

    /**
     * @Route("/new", name="justificative_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $justificative = new Justificative();
        $form = $this->createForm(JustificativeType::class, $justificative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($justificative);
            $entityManager->flush();

            return $this->redirectToRoute('justificative_index');
        }

        return $this->render('justificative/new.html.twig', [
            'justificative' => $justificative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="justificative_show", methods={"GET"})
     */
    public function show(Justificative $justificative): Response
    {
        return $this->render('justificative/show.html.twig', [
            'justificative' => $justificative,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="justificative_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Justificative $justificative): Response
    {
        $form = $this->createForm(JustificativeType::class, $justificative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('justificative_index');
        }

        return $this->render('justificative/edit.html.twig', [
            'justificative' => $justificative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="justificative_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Justificative $justificative): Response
    {
        if ($this->isCsrfTokenValid('delete'.$justificative->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($justificative);
            $entityManager->flush();
        }

        return $this->redirectToRoute('justificative_index');
    }
}
