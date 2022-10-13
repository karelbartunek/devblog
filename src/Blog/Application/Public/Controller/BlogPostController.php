<?php

namespace App\Blog\Application\Public\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    #[Route(path: '/list', name: 'list', methods: ['GET'])]
    public function list(): Response
    {

    }
}
