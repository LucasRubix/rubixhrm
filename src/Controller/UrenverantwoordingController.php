<?php

namespace App\Controller;

use App\Entity\Stagiair;
use App\Entity\Urenverantwoording;
use App\Form\StagiairType;
use App\Form\UrenverantwoordingType;
use App\Repository\StagiairRepository;
use App\Repository\UrenverantwoordingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/urenverantwoording")
 */
class UrenverantwoordingController extends AbstractController
{
    /**
     * @Route("/", name="urenverantwoording_index", methods={"GET"})
     */
    public function index(UrenverantwoordingRepository $urenverantwoordingRepository, StagiairRepository $stagiairRepository): Response
    {
        return $this->render('urenverantwoording/index.html.twig', [
            'urenverantwoordings' => $urenverantwoordingRepository->findBy(['Stagiair_id' => $stagiairRepository->findBy(['User_id' => $this->getUser()])]),
        ]);
    }

    /**
     * @Route("/new", name="urenverantwoording_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $urenverantwoording = new Urenverantwoording();
        $form = $this->createForm(UrenverantwoordingType::class, $urenverantwoording);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($urenverantwoording);
            $entityManager->flush();

            return $this->redirectToRoute('urenverantwoording_index');
        }

        return $this->render('urenverantwoording/new.html.twig', [
            'urenverantwoording' => $urenverantwoording,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="urenverantwoording_show", methods={"GET"})
     */
    public function show(Urenverantwoording $urenverantwoording): Response
    {
        return $this->render('urenverantwoording/show.html.twig', [
            'urenverantwoording' => $urenverantwoording,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="urenverantwoording_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Urenverantwoording $urenverantwoording): Response
    {
        $form = $this->createForm(UrenverantwoordingType::class, $urenverantwoording);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('urenverantwoording_index', [
                'id' => $urenverantwoording->getId(),
            ]);
        }

        return $this->render('urenverantwoording/edit.html.twig', [
            'urenverantwoording' => $urenverantwoording,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="urenverantwoording_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Urenverantwoording $urenverantwoording): Response
    {
        if ($this->isCsrfTokenValid('delete' . $urenverantwoording->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($urenverantwoording);
            $entityManager->flush();
        }

        return $this->redirectToRoute('urenverantwoording_index');
    }

}
