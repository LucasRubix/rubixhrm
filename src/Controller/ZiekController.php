<?php

namespace App\Controller;

use App\Entity\Ziek;
use App\Form\ZiekType;
use App\Repository\ZiekRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ziek")
 */
class ZiekController extends AbstractController
{
    /**
     * @Route("/", name="ziek_index", methods={"GET"})
     */
    public function index(ZiekRepository $ziekRepository): Response
    {

        if ($this->isGranted("ROLE_SUPER_ADMIN")){

            return $this->render('ziek/index.html.twig', ['zieks' => $ziekRepository->findAll()]);
        } else {
            return $this->render('ziek/index.html.twig', [
                'zieks' => $ziekRepository->findAll(),
            ]);
        }
    }

    /**
     * @Route("/new", name="ziek_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ziek = new Ziek();
        $form = $this->createForm(ZiekType::class, $ziek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ziek);
            $entityManager->flush();

            return $this->redirectToRoute('ziek_index');
        }

        return $this->render('ziek/new.html.twig', [
            'ziek' => $ziek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ziek_show", methods={"GET"})
     */
    public function show(Ziek $ziek): Response
    {
        return $this->render('ziek/show.html.twig', [
            'ziek' => $ziek,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ziek_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ziek $ziek): Response
    {
        $form = $this->createForm(ZiekType::class, $ziek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ziek_index', [
                'id' => $ziek->getId(),
            ]);
        }

        return $this->render('ziek/edit.html.twig', [
            'ziek' => $ziek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ziek_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ziek $ziek): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ziek->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ziek);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ziek_index');
    }
}
