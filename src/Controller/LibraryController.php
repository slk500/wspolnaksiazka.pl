<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LibraryController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return $this->render('base.html.twig');
    }
}

