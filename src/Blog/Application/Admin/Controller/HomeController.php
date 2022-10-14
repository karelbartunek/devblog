<?php

namespace App\Blog\Application\Admin\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/admin', name: 'admin_home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->render('admin/home.html.twig', [

        ]);
    }
}
