<?php

namespace App\Controller;

use App\Entity\Telaat;
use App\Form\TelaatType;
use App\Repository\TelaatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/telaat")
 */
class TelaatController extends AbstractController
{
    /**
     * @Route("/", name="telaat_index", methods={"GET"})
     */
    public function index(TelaatRepository $telaatRepository): Response
    {
        if ($this->isGranted("ROLE_SUPER_ADMIN")){

            return $this->render('telaat/index.html.twig', ['telaats' => $telaatRepository->findAll()]);
        } else {

            return $this->render('telaat/index.html.twig', [
                'telaats' => $telaatRepository->findBy(
                    [
                        'User_id' => $this->getUser()
                    ]
                ),
            ]);

        }



    }

    /**
     * @Route("/new", name="telaat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $telaat = new Telaat();
        $form = $this->createForm(TelaatType::class, $telaat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($telaat);
            $entityManager->flush();

            return $this->redirectToRoute('telaat_index');
        }

        return $this->render('telaat/new.html.twig', [
            'telaat' => $telaat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="telaat_show", methods={"GET"})
     */
    public function show(Telaat $telaat): Response
    {
        return $this->render('telaat/show.html.twig', [
            'telaat' => $telaat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="telaat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Telaat $telaat): Response
    {
        $form = $this->createForm(TelaatType::class, $telaat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('telaat_index', [
                'id' => $telaat->getId(),
            ]);
        }

        return $this->render('telaat/edit.html.twig', [
            'telaat' => $telaat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="telaat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Telaat $telaat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telaat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($telaat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('telaat_index');
    }
}
