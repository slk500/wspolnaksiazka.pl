<?php

declare(strict_types=1);

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="library_book")
 */
class LibraryBook
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Library
     * @ORM\ManyToOne(targetEntity="App\Entity\Library")
     */
    private $library;

    /**
     * @var Book
     * @ORM\ManyToOne(targetEntity="App\Entity\Book")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     * @ORM\JoinColumn(nullable=false)
     */
    private $created_at;

    public function __construct(Library $library, Book $book)
    {
        $this->library = $library;
        $this->book = $book;
        $this->created_at = new \DateTime('now');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function getLibrary(): Library
    {
        return $this->library;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }
}

