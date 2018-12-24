<?php


namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $author;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $isbn;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $year;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     */
    private $info;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;

    /**
     * @var LibraryBook
     * @ORM\OneToMany(targetEntity="LibraryBook", mappedBy="book")
     */
    private $libraryBook;

    public function __construct()
    {
        $this->libraryBook = new ArrayCollection();
        $this->created_at = new \DateTime('now');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getLibraries()
    {
        return $this->libraryBook->map(function (LibraryBook $libraryBook) {
            return $libraryBook->getLibrary();
        })->toArray();
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): void
    {
        $this->info = $info;
    }

    public function getLibraryBook(): LibraryBook
    {
        return $this->libraryBook;
    }

    public function setLibraryBook(LibraryBook $libraryBook): void
    {
        $this->libraryBook = $libraryBook;
    }
}