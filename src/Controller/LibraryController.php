<?php


namespace App\Controller;


use App\Entity\Library;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

class LibraryController extends AbstractController
{
    /**
     * @Route("/biblioteki")
     */
    public function list(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $libraries = $entityManager
            ->getRepository(Library::class)
            ->findAll();

        return $this->render('base.html.twig',[
            'libraries' => $libraries
        ]);
    }
}

