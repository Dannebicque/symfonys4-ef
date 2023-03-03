<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Form\AdresseType;
use App\Repository\AdresseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdresseController extends AbstractController
{
    #[Route('/adresse', name: 'app_adresse')]
    public function index(
        Request $request,
        AdresseRepository $adresseRepository,
        EntityManagerInterface $entityManager
    ): Response
    {
        $adresse = new Adresse();
        $form = $this->createForm(
            AdresseType::class,
            $adresse
        );

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $adresseRepository->save($adresse, true); //sauvegarde
            // ou
            // $entityManager->persist($adresse);
            // $entityManager->flush();
            return $this->redirectToRoute('app_home');//rediriger vers la page d'accueil par exemple
        }

        return $this->render('adresse/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
