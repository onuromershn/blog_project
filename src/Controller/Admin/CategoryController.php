<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/admin/categories", name="app_admin_category")
     */
    public function list(): Response
    {
        return $this->render('admin/category/list.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }


    /**
     * @Route("/admin/category/add", name="app_admin_category_add")
     */
    public function addPost(): Response
    {
        return $this->render('admin/category/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
