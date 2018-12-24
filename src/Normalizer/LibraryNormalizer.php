<?php


namespace App\Normalizer;


use App\Entity\Book;
use App\Entity\Library;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class LibraryNormalizer implements NormalizerInterface
{
    public function normalize($object, $format = null, array $context = array())
    {
        $books = $this->normalizeBooks($object);

        /**
         * @var $object Library
         */

        return [
            'id'  => $object->getId(),
            'name' => $object->getName(),
            'city' => $object->getCity(),
            'distrixt' => $object->getDistrict(),
            'street' => $object->getStreet(),
            'houseNumber' => $object->getHouseNumber(),
            'userId' => $object->getUser() ? $object->getUser()->getId() : null,
            'books' => $books
        ];
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Library;
    }

    private function normalizeBooks($object): array
    {
        $booksObjects = $object->getBooks();

        array_map(function (Book $book) {
        }, $booksObjects);

        $books = [];

        /**
         * @var $book Book
         */
        foreach ($booksObjects as $book) {
            $books []= [
                'author' => $book->getAuthor(),
                'title' => $book->getTitle(),
                'year' => $book->getYear(),
                'info' => $book->getInfo(),
                'user' => $book->getUser() ? $book->getUser()->getUsername() : null,
            ];
        }

        return $books;
    }

}