<?php


namespace App\Controller;


use App\Entity\Book;
use App\Entity\LibraryBook;
use App\Form\BookFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BookController extends AbstractController
{
    /**
     * @Route("/ksiazki/nowa")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(BookFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $bookData = $form->getData();

            $book = new Book();
            $book->setTitle($bookData['title']);
            $book->setAuthor($bookData['author']);

            if ($bookData['year']) {
                $book->setYear($bookData['year']);
            }

            if ($bookData['library']) {
                $libraryBook = new LibraryBook($bookData['library'], $book);
            }

            $entityManager->persist($book);
            $entityManager->persist($libraryBook);
            $entityManager->flush();

            $this->addFlash('success', 'Świetnie! Dodałeś nową książkę :)');

            return $this->redirectToRoute('app_book_list');
        }

        return $this->render('book/create.html.twig', [
            'bookForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/ksiazki")
     */
    public function list()
    {
        return $this->render('book/list.html.twig');
    }
}

