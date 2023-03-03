<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Repository\FournisseurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{
    #[Route('/fournisseur', name: 'app_fournisseur')]
    public function index(
        Request $request,
        FournisseurRepository $fournisseurRepository
    ): Response
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(
            FournisseurType::class,
            $fournisseur
        );

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $fournisseurRepository->save($fournisseur, true); //sauvegarde le fournisseur et son adresse
            return $this->redirectToRoute('app_home');//rediriger vers la page d'accueil par exemple
        }

        return $this->render('fournisseur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
