<?php

namespace App\Blog\Application\Public\Controller;

use App\Blog\Domain\BlogPost\CreateBlogPost;
use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Application\Public\Form\BlogPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    #[Route(path: 'blog/detail', name: 'blog_detail', methods: ['GET', 'POST'])]
    public function new(Request $request, CreateBlogPost $createBlogPost): Response
    {
        $blogPost = new BlogPost();

        $form = $this->createForm(BlogPostType::class, $blogPost);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $blogPost = $form->getData();

            try {
                $createBlogPost($blogPost);
            } catch (\Exception) {
                error_log('Error');
            }

            return $this->redirectToRoute('blog');
        }

        return $this->renderForm('blog/blogpost/new.html.twig', [
            'form' => $form,
        ]);
    }
}
