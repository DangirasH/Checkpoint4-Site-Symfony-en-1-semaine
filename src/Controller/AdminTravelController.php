<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Form\TravelType;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/travel')]
class AdminTravelController extends AbstractController
{
    #[Route('/', name: 'app_admin_travel_index', methods: ['GET'])]
    public function index(TravelRepository $travelRepository): Response
    {
        return $this->render('admin_travel/index.html.twig', [
            'travel' => $travelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_travel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TravelRepository $travelRepository): Response
    {
        $travel = new Travel();
        $form = $this->createForm(TravelType::class, $travel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $travelRepository->add($travel, true);

            return $this->redirectToRoute('app_admin_travel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_travel/new.html.twig', [
            'travel' => $travel,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_admin_travel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Travel $travel, TravelRepository $travelRepository): Response
    {
        $form = $this->createForm(TravelType::class, $travel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $travelRepository->add($travel, true);

            return $this->redirectToRoute('app_admin_travel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_travel/edit.html.twig', [
            'travel' => $travel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_travel_delete', methods: ['POST'])]
    public function delete(Request $request, Travel $travel, TravelRepository $travelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $travel->getId(), $request->request->get('_token'))) {
            $travelRepository->remove($travel, true);
        }

        return $this->redirectToRoute('app_admin_travel_index', [], Response::HTTP_SEE_OTHER);
    }
}
