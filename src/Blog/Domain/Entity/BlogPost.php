<?php

namespace App\Blog\Domain\Entity;

use App\Blog\Infrastructure\Repository\BlogPostRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogPostRepository::class)]
class BlogPost
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $blogPostTitle;

    #[ORM\Column(type: 'string', length: 255)]
    private $blogPostContent;

    #[ORM\Column(type: 'datetime_immutable')]
    private $blogPostCreatedAt;

    public function __construct()
    {
        $this->blogPostCreatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlogPostTitle(): ?string
    {
        return $this->blogPostTitle;
    }

    public function setBlogPostTitle(string $blogPostTitle): self
    {
        $this->blogPostTitle = $blogPostTitle;

        return $this;
    }

    public function getBlogPostContent(): ?string
    {
        return $this->blogPostContent;
    }

    public function setBlogPostContent(string $blogPostContent): self
    {
        $this->blogPostContent = $blogPostContent;

        return $this;
    }

    public function getBlogPostCreatedAt(): ?\DateTimeImmutable
    {
        return $this->blogPostCreatedAt;
    }

    public function setBlogPostCreatedAt(\DateTimeImmutable $blogPostCreatedAt): self
    {
        $this->blogPostCreatedAt = $blogPostCreatedAt;

        return $this;
    }
}
