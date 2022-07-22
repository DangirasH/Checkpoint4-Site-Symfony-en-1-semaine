<?php

namespace App\Controller;

use App\Entity\Recomendations;
use App\Form\RecomendationsType;
use App\Repository\RecomendationsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/reco')]
class AdminRecoController extends AbstractController
{
    #[Route('/', name: 'app_admin_reco_index', methods: ['GET'])]
    public function index(RecomendationsRepository $recomendationsRepository): Response
    {
        return $this->render('admin_reco/index.html.twig', [
            'recomendations' => $recomendationsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_reco_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecomendationsRepository $recomendationsRepository): Response
    {
        $recomendation = new Recomendations();
        $form = $this->createForm(RecomendationsType::class, $recomendation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recomendationsRepository->add($recomendation, true);

            return $this->redirectToRoute('app_admin_reco_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reco/new.html.twig', [
            'recomendation' => $recomendation,
            'form' => $form,
        ]);
    }

    

    #[Route('/{id}/edit', name: 'app_admin_reco_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recomendations $recomendation, RecomendationsRepository $recomendationsRepository): Response
    {
        $form = $this->createForm(RecomendationsType::class, $recomendation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recomendationsRepository->add($recomendation, true);

            return $this->redirectToRoute('app_admin_reco_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reco/edit.html.twig', [
            'recomendation' => $recomendation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reco_delete', methods: ['POST'])]
    public function delete(Request $request, Recomendations $recomendation, RecomendationsRepository $recomendationsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recomendation->getId(), $request->request->get('_token'))) {
            $recomendationsRepository->remove($recomendation, true);
        }

        return $this->redirectToRoute('app_admin_reco_index', [], Response::HTTP_SEE_OTHER);
    }
}
