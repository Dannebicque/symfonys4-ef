<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article, [
            'codePostal' => '10000'
        ]);

        //gérer la sauvegarde...

        return $this->render('article/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
