<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/api")
 */

class SecurityController extends AbstractController
{
  /**
   * @Route("/login", name="app_login")
   */
  public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
  {
    if ($this->getUser()) {
      return $this->redirectToRoute('index', array('vueRouting' => 'home'));
    } else {
      // get the login error if there is one
      $error = $authenticationUtils->getLastAuthenticationError();
      // last username entered by the user
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('security/login.html.twig', [
        'error' => $error,
        'last_username' => $lastUsername
      ]);
    }
  }

  /**
   * @Route("/logout", name="app_logout")
   */
  public function logout()
  {
    throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
  }
}
