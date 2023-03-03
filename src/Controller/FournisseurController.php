<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{
    #[Route('/fournisseur', name: 'app_fournisseur')]
    public function index(): Response
    {
        $fournisseur = new Fournisseur();
        $form = $this->createForm(
            FournisseurType::class,
            $fournisseur
        );

        return $this->render('fournisseur/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
