<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/articles', name: 'app_article_')]
class ArticleController extends AbstractController
{
    #[Route('/{id<\d+>}', name: 'show')]
    public function index(Article $article): Response
    {
        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }
}
