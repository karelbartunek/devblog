<?php

namespace App\Blog\Application\Public\Controller;

use App\Blog\Infrastructure\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    #[Route(path: 'blog/detail/{blogPostId}', name: 'blog_detail', methods: ['GET'])]
    public function detail(int $blogPostId, BlogPostRepository $blogPostRepository): Response
    {
        $blogPost = $blogPostRepository->find($blogPostId);

        return $this->render('blog/detail.html.twig', [
            'blog_post' => $blogPost
        ]);
    }
}
