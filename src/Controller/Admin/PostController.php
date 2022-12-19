<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/admin/posts", name="app_admin_post")
     */
    public function list(): Response
    {
        return $this->render('admin/post/list.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/admin/post/add", name="app_admin_post_add")
     */
    public function addPost(): Response
    {
        return $this->render('admin/post/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
