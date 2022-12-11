<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    /**
     * @Route("/admin/base", name="app_admin_base")
     */
    public function index(): Response
    {
        return $this->render('admin/base/base.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
