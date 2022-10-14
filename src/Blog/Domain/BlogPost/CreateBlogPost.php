<?php

namespace App\Blog\Domain\BlogPost;

use App\Blog\Domain\Entity\BlogPost;
use Doctrine\ORM\EntityManagerInterface;

class CreateBlogPost
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function __invoke(BlogPost $blogPost): bool
    {
        // Some actions with blogPost or something else

        $this->entityManager->persist($blogPost);
        $this->entityManager->flush();

        return true;
    }
}