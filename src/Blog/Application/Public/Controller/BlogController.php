<?php

namespace App\Blog\Application\Public\Controller;

use App\Blog\Infrastructure\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route(path: '/blog', name: 'blog', methods: ['GET'])]
    public function list(BlogPostRepository $blogPostRepository): Response
    {
        $blogPosts = $blogPostRepository->findAll();

        return $this->render('blog/list.html.twig', [
            'blog_posts' => $blogPosts
        ]);
    }
}
