<?php

namespace App\Controller;

use App\Form\LoginForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
        $form = $this->createForm(LoginForm::class);

        return $this->render('security/login.html.twig',
            [
                'form' => $form->createView(),
                'error' => $error,
            ]
        );
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {

    }
}
