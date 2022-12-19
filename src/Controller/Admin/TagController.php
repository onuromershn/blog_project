<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @Route("/admin/tags", name="app_admin_tag")
     */
    public function index(): Response
    {
        return $this->render('admin/tag/list.html.twig', [
            'controller_name' => 'TagController',
        ]);
    }

    /**
     * @Route("/admin/tag/add", name="app_admin_tag_add")
     */
    public function addPost(): Response
    {
        return $this->render('admin/tag/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
