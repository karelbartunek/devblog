<?php

namespace App\Blog\Application\Admin\Controller;

use App\Blog\Infrastructure\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/admin', name: 'admin_home', methods: ['GET'])]
    public function home(BlogPostRepository $blogPostRepository): Response
    {
        $blogPosts = $blogPostRepository->findAll();

        return $this->render('admin/home.html.twig', [
            'blog_posts' => $blogPosts
        ]);
    }
}
