<?php


namespace App\Controller\Api;


use App\Entity\Library;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class LibraryController extends AbstractController
{
    /**
     * @Route("/api/libraries")
     */
    public function list(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $libraries = $entityManager
            ->getRepository(Library::class)
            ->findAll();

        $librariesInJson = $serializer->serialize(['data' => $libraries], 'json');

        return new Response($librariesInJson);
    }

    /**
     * @Route("/api/libraries/{id}")
     */
    public function show(Library $library, EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $librariesInJson = $serializer->serialize(['data' => [$library]], 'json');

        return new Response($librariesInJson);
    }
}

