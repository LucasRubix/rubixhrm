<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NieuwsRepository;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(NieuwsRepository $nieuwsRepository)
    {
        $user = $this->getUser();

        return $this->render('default/index.html.twig', [
            'user' => $user,
            'nieuws' => $nieuwsRepository->findBy([], ['datum' => 'DESC'])
        ]);
    }
}
