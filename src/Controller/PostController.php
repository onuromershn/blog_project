<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/posts", name="app_posts")
     */
    public function list(): Response
    {
        return $this->render('post/list.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/post/detail", name="app_post")
     */
    public function view(): Response
    {
        return $this->render('post/detail.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
