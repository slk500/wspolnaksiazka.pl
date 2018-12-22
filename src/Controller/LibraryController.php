<?php


namespace App\Controller;

use App\Form\LibraryFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class LibraryController extends AbstractController
{
    /**
     * @Route("/biblioteki/nowa")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(LibraryFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $library = $form->getData();

            $entityManager->persist($library);
            $entityManager->flush();

            $this->addFlash('success','Super! Dodałeś nową bibliotekę :)');
        }

        return $this->render('library/create.html.twig' , [
                'libraryForm' => $form->createView()
            ]);
    }


    /**
     * @Route("/biblioteki")
     */
    public function list()
    {
        return $this->render('library/list.html.twig');
    }
}

