<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(description: 'The book resource describe a book with its print length')]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column]
    private ?int $printLength = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Library $library = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getPrintLength(): ?int
    {
        return $this->printLength;
    }

    public function setPrintLength(int $printLength): static
    {
        $this->printLength = $printLength;

        return $this;
    }

    public function getLibrary(): ?Library
    {
        return $this->library;
    }
    
//    public function getLibraryId(): ?int
//    {
//        return $this->library->getId();
//    }

    public function setLibrary(?Library $library): static
    {
        $this->library = $library;

        return $this;
    }
}
