<?php

namespace App\Blog\Application\Admin\Controller;

use App\Blog\Domain\BlogPost\CreateBlogPost;
use App\Blog\Domain\BlogPost\RemoveBlogPost;
use App\Blog\Domain\Entity\BlogPost;
use App\Blog\Application\Public\Form\BlogPostType;
use App\Blog\Infrastructure\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    #[Route(path: 'admin/new', name: 'admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CreateBlogPost $createBlogPost): Response
    {
        $form = $this->createForm(BlogPostType::class, new BlogPost());

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

        return $this->renderForm('admin/blogpost/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route(path: 'admin/remove/{blogPostId}', name: 'admin_remove', methods: ['GET'])]
    public function remove(string $blogPostId, RemoveBlogPost $removeBlogPost)
    {
        try {
            $removeBlogPost($blogPostId);
        } catch (\Exception) {
            error_log('Error');
        }

        return $this->redirectToRoute('admin_home');
    }

    #[Route(path: 'admin/edit/{blogPostId}', name: 'admin_edit', methods: ['GET', 'POST'])]
    public function edit(
        string $blogPostId,
        Request $request,
        CreateBlogPost $createBlogPost,
        BlogPostRepository $blogPostRepository
    ) {
        $blogPost = $blogPostRepository->findOneBy(['id' => $blogPostId]);

        $form = $this->createForm(BlogPostType::class, $blogPost);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $blogPost = $form->getData();

            try {
                $createBlogPost($blogPost);
            } catch (\Exception) {
                error_log('Error');
            }

            return $this->redirectToRoute('admin_home');
        }

        return $this->renderForm('admin/blogpost/new.html.twig', [
            'form' => $form,
        ]);
    }
}
