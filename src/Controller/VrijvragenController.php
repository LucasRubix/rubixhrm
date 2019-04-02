<?php

namespace App\Controller;

use App\Entity\Vrijvragen;
use App\Form\VrijvragenType;
use App\Repository\TelaatRepository;
use App\Repository\ZiekRepository;
use App\Repository\VrijvragenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vrijvragen")
 */
class VrijvragenController extends AbstractController
{
    /**
     * @Route("/", name="vrijvragen_index", methods={"GET"})
     */
    public function index(VrijvragenRepository $vrijvragenRepository, TelaatRepository $telaatRepository, ZiekRepository $ziekRepository): Response
    {

        if ($this->isGranted("ROLE_SUPER_ADMIN")){

            return $this->render('vrijvragen/index.html.twig', ['telaats' => $telaatRepository->findAll(), 'zieks' => $ziekRepository->findAll(), 'vrijvragens' => $ziekRepository->findAll()]);
        } else {

            return $this->render('vrijvragen/index.html.twig', [
                'telaats' => $telaatRepository->findBy(
                    [
                        'User_id' => $this->getUser()
                    ]
                ),
                'zieks' => $ziekRepository->findBy(
                    [
                        'User_id' => $this->getUser()
                    ]
                ),
                'vrijvragens' => $vrijvragenRepository->findAll(),
            ]);
        }
    }

    /**
     * @Route("/new", name="vrijvragen_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vrijvragen = new Vrijvragen();
        $form = $this->createForm(VrijvragenType::class, $vrijvragen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vrijvragen);
            $entityManager->flush();

            return $this->redirectToRoute('vrijvragen_index');
        }

        return $this->render('vrijvragen/new.html.twig', [
            'vrijvragen' => $vrijvragen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vrijvragen_show", methods={"GET"})
     */
    public function show(Vrijvragen $vrijvragen): Response
    {
        return $this->render('vrijvragen/show.html.twig', [
            'vrijvragen' => $vrijvragen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vrijvragen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vrijvragen $vrijvragen): Response
    {
        $form = $this->createForm(VrijvragenType::class, $vrijvragen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vrijvragen_index', [
                'id' => $vrijvragen->getId(),
            ]);
        }

        return $this->render('vrijvragen/edit.html.twig', [
            'vrijvragen' => $vrijvragen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vrijvragen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vrijvragen $vrijvragen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vrijvragen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vrijvragen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vrijvragen_index');
    }
}
