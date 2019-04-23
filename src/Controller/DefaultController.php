<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NieuwsRepository;
use App\Repository\VrijvragenRepository;
use App\Entity\User;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(NieuwsRepository $nieuwsRepository, VrijvragenRepository $vrijvragenRepository)
    {
        $user = $this->getUser();
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('default/index.html.twig', [
            'user' => $user,
            'users' => $users,
            'nieuws' => $nieuwsRepository->findBy([], ['datum' => 'DESC']),
            'vrijvragen' => $vrijvragenRepository->findAll()
        ]);
    }
}
