<?php

namespace App\Controller;

use App\Entity\Loonstroken;
use App\Form\LoonstrokenType;
use App\Repository\LoonstrokenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/loonstroken")
 */
class LoonstrokenController extends AbstractController
{
    /**
     * @Route("/", name="loonstroken_index", methods={"GET"})
     */
    public function index(LoonstrokenRepository $loonstrokenRepository): Response
    {
        return $this->render('loonstroken/index.html.twig', [
            'loonstrokens' => $loonstrokenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="loonstroken_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $loonstroken = new Loonstroken();
        $form = $this->createForm(LoonstrokenType::class, $loonstroken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loonstroken);
            $entityManager->flush();

            return $this->redirectToRoute('loonstroken_index');
        }

        return $this->render('loonstroken/new.html.twig', [
            'loonstroken' => $loonstroken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="loonstroken_show", methods={"GET"})
     */
    public function show(Loonstroken $loonstroken): Response
    {
        return $this->render('loonstroken/show.html.twig', [
            'loonstroken' => $loonstroken,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="loonstroken_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Loonstroken $loonstroken): Response
    {
        $form = $this->createForm(LoonstrokenType::class, $loonstroken);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loonstroken_index', [
                'id' => $loonstroken->getId(),
            ]);
        }

        return $this->render('loonstroken/edit.html.twig', [
            'loonstroken' => $loonstroken,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="loonstroken_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Loonstroken $loonstroken): Response
    {
        if ($this->isCsrfTokenValid('delete'.$loonstroken->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($loonstroken);
            $entityManager->flush();
        }

        return $this->redirectToRoute('loonstroken_index');
    }
}
