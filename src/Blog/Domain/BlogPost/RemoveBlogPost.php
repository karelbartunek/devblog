<?php

namespace App\Blog\Domain\BlogPost;

use App\Blog\Domain\Entity\BlogPost;
use Doctrine\ORM\EntityManagerInterface;

class RemoveBlogPost
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function __invoke(string $blogPostId): void
    {
        // Call some actions with blogPost on delete (cache etc.)

        $blogPost = $this->entityManager->getReference(BlogPost::class, $blogPostId);
        $this->entityManager->remove($blogPost);
        $this->entityManager->flush();
    }
}