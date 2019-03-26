<?php

namespace App\Controller;

use App\Entity\HandigeLinks;
use App\Form\HandigeLinksType;
use App\Repository\HandigeLinksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/handige/links")
 */
class HandigeLinksController extends AbstractController
{
    /**
     * @Route("/", name="handige_links_index", methods={"GET"})
     */
    public function index(HandigeLinksRepository $handigeLinksRepository): Response
    {
        return $this->render('handige_links/index.html.twig', [
            'handige_links' => $handigeLinksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="handige_links_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $handigeLink = new HandigeLinks();
        $form = $this->createForm(HandigeLinksType::class, $handigeLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($handigeLink);
            $entityManager->flush();

            return $this->redirectToRoute('handige_links_index');
        }

        return $this->render('handige_links/new.html.twig', [
            'handige_link' => $handigeLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="handige_links_show", methods={"GET"})
     */
    public function show(HandigeLinks $handigeLink): Response
    {
        return $this->render('handige_links/show.html.twig', [
            'handige_link' => $handigeLink,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="handige_links_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HandigeLinks $handigeLink): Response
    {
        $form = $this->createForm(HandigeLinksType::class, $handigeLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('handige_links_index', [
                'id' => $handigeLink->getId(),
            ]);
        }

        return $this->render('handige_links/edit.html.twig', [
            'handige_link' => $handigeLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="handige_links_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HandigeLinks $handigeLink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$handigeLink->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($handigeLink);
            $entityManager->flush();
        }

        return $this->redirectToRoute('handige_links_index');
    }
}
