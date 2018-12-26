<?php


namespace App\Normalizer;


use App\Entity\Book;
use App\Entity\Library;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BookNormalizer implements NormalizerInterface
{
    public function normalize($object, $format = null, array $context = array())
    {
        $libraries = $this->normalizeLibraries($object);

        /**
         * @var $object Book
         */

        return [
            'title'  => $object->getTitle(),
            'author' => $object->getAuthor(),
            'user' => $object->getUser(),
            'libraries' => $libraries
        ];
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Book;
    }

    private function normalizeLibraries($object): array
    {
        $librariesObjects = $object->getLibraries();

        array_map(function (Library $library) {
        }, $librariesObjects);

        $libraries = [];

        /**
         * @var $library Library
         */
        foreach ($librariesObjects as $library) {
            $libraries []= [
                'id' => $library->getId(),
                'name' => $library->getName(),
                'city' => $library->getCity(),
                'district' => $library->getDistrict(),
            ];
        }

        return $libraries;
    }

}