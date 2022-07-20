<?php

namespace App\Controller;

use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{
    #[Route('/travel', name: 'app_travel')]
    public function index(TravelRepository $travelRepository): Response
    {
        $travel = $travelRepository->findAll();
        return $this->render('travel/index.html.twig', [
            'travel' => $travel,
            'controller_name' => 'TravelController',
        ]);
    }
}
