<?php


namespace App\Controller;

use App\Entity\Library;
use App\Form\LibraryFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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

            $this->addFlash('success','Świetnie! Dodałeś nową bibliotekę :)');

            return $this->redirectToRoute('app_library_list');
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

    /**
     * @Route("/biblioteki/{id}")
     */
    public function show(Library $library, NormalizerInterface $normalizer)
    {
        $library = $normalizer->normalize($library);

        return $this->render('library/show.html.twig', [
            'library' => $library
        ]);
    }
}

