<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/travel', name: 'travel_')]
class TravelController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(TravelRepository $travelRepository): Response
    {
        $travel = $travelRepository->findAll();
        return $this->render('travel/index.html.twig', [
            'travel' => $travel,
            'controller_name' => 'TravelController',
        ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show(Travel $travel): Response
    {
        $recomendations = $travel->getRecomendations();

        return $this->render('travel/show.html.twig', [
            'travel' => $travel,
            'recomendations' => $recomendations,
            'controller_name' => 'TravelController',
        ]);
    }
}
