<?php

namespace App\Controller;


use App\Repository\DownloadsRepository;
use App\Repository\HandigeLinksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DownloadsenHandigelinksController extends AbstractController
{
    /**
     * @Route("/downloadsen/handigelinks", name="downloadsen_handigelinks")
     */
    public function index(DownloadsRepository $downloadsRepository, HandigeLinksRepository $handigeLinksRepository)
    {
        return $this->render('downloadsen_handigelinks/index.html.twig', [
            'controller_name' => 'DownloadsenHandigelinksController',
            'downloads' => $downloadsRepository->findAll(),
            'handige_links' => $handigeLinksRepository->findAll()]);
    }
}
