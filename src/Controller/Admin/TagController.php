<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    /**
     * @Route("/admin/tags", name="admin_tags")
     */
    public function list(TagRepository $tagRepository): Response
    {
        $tags = $tagRepository->findAll();

        return $this->render('admin/tag/list.html.twig', [
            'controller_name' => 'TagController',
            'tags'=>$tags
        ]);
    }

    /**
     * @Route("/admin/tag/add", name="app_admin_tag_add")
     */
    public function addTag(Request $request, EntityManagerInterface $entityManager)
    {
        if ($request->getMethod()===Request::METHOD_POST){
            $tag = new Tag();
            $tag->setTitle($request->request->get('title'));
            $tag->setCreatedAt(new \DateTime());
            $entityManager->persist($tag);
            $entityManager->flush($tag);
            return $this->redirectToRoute("admin_tags");
        }
        return $this->render('admin/tag/add.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
}
