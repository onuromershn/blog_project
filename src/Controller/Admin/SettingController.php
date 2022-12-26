<?php

namespace App\Controller\Admin;

use App\Entity\Settings;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingController extends AbstractController
{
    /**
     * @Route("/admin/settings", name="admin_setting")
     */
    public function index(Request $request,EntityManagerInterface $entityManager): Response
    {
        $settings = $this->getDoctrine()->getRepository(Settings::class)->find(1);
        if ($request->getMethod()===Request::METHOD_POST){
//            /**
//             * @var UploadedFile $imageFile
//             */
//            $imageFile = $request->files->get('logo');
//            $uploadsDirectory = $this->getParameter('uploads_directory');
//            $fileName = md5(uniqid()).'.'.$imageFile->guessExtension();
//            $imageFile->move($uploadsDirectory,$fileName);
            $settings = new Settings();
            $settings->setFacebook($request->request->get('facebokk'));
            $settings->setTwitter($request->request->get('twitter'));
            $settings->setInstagram($request->request->get('instagram'));
            $settings->setYoutube($request->request->get('youtube'));
            $settings->setLinkedin($request->request->get('linkedin'));
            $settings->setCopyright($request->request->get('copyright'));
            $settings->setNewslatter($request->request->get('newslatter'));
            $settings->setAddress($request->request->get('address'));
            $settings->setMail($request->request->get('mail'));
            $settings->setPhone($request->request->get('phone'));
            $settings->setAbout($request->request->get('about'));
            $entityManager->persist($settings);
            $entityManager->flush($settings);
            $this->redirectToRoute('admin_setting');

        }
        return $this->render('admin/setting/index.html.twig', [
            'controller_name' => 'SettingController',
            'settings'=>$settings
        ]);
    }
}
