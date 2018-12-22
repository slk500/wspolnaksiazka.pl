<?php


namespace App\Controller;


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

            $book = $form->getData();

            $entityManager->persist($book);
            $entityManager->flush();

            $this->addFlash('success','Super! Dodałeś nową książkę :)');
        }

        return $this->render('library/create.html.twig' , [
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

