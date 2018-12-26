<?php


namespace App\Controller\Api;


use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class BookController extends AbstractController
{
    /**
     * @Route("/api/books")
     */
    public function list(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $books = $entityManager
            ->getRepository(Book::class)
            ->findAll();

        $booksInJson = $serializer->serialize(['data' => $books], 'json');

        return new Response($booksInJson);
    }
}

