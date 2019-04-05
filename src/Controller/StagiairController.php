<?php

namespace App\Controller;

use App\Entity\Stagiair;
use App\Form\StagiairType;
use App\Repository\StagiairRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stagiair")
 */
class StagiairController extends AbstractController
{
    /**
     * @Route("/", name="stagiair_index", methods={"GET"})
     */
    public function index(StagiairRepository $stagiairRepository): Response
    {

        if ($this->isGranted("ROLE_SUPER_ADMIN")){

            return $this->render('stagiair/index.html.twig', ['stagiairs' => $stagiairRepository->findAll()]);
        } else {

            return $this->render('stagiair/index.html.twig', [
                'stagiairs' => $stagiairRepository->findBy(
                    [
                        'User_id' => $this->getUser()
                    ]
                ),
            ]);
        }
    }

    /**
     * @Route("/new", name="stagiair_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stagiair = new Stagiair();
        $form = $this->createForm(StagiairType::class, $stagiair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stagiair);
            $entityManager->flush();

            return $this->redirectToRoute('stagiair_index');
        }

        return $this->render('stagiair/new.html.twig', [
            'stagiair' => $stagiair,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stagiair_show", methods={"GET"})
     */
    public function show(Stagiair $stagiair): Response
    {
        return $this->render('stagiair/show.html.twig', [
            'stagiair' => $stagiair,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stagiair_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stagiair $stagiair): Response
    {
        $form = $this->createForm(StagiairType::class, $stagiair);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stagiair_index', [
                'id' => $stagiair->getId(),
            ]);
        }

        return $this->render('stagiair/edit.html.twig', [
            'stagiair' => $stagiair,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stagiair_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Stagiair $stagiair): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stagiair->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stagiair);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stagiair_index');
    }
}
