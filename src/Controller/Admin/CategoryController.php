<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/admin/categories", name="admin_categories")
     */
    public function list(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('admin/category/list.html.twig', [
            'controller_name' => 'CategoryController',
            'categories'=>$categories
        ]);
    }


    /**
     * @Route("/admin/category/add", name="app_admin_category_add")
     */
    public function addCategory(Request $request,EntityManagerInterface $entityManager): Response
    {
        if ($request->getMethod()===Request::METHOD_POST){
            $category = new Category();
            $category->setTitle($request->request->get('title'));
            $category->setCreatedAt(new \DateTime());
            $entityManager->persist($category);
            $entityManager->flush($category);
            return $this->redirectToRoute('admin_categories');
        }
        return $this->render('admin/category/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
