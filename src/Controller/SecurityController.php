<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

/**
 * @Route("/api")
 */

class SecurityController extends AbstractController
{
  /** @var SerializerInterface */
  private $serializer;

  public function __construct(SerializerInterface $serializer)
  {
    $this->serializer = $serializer;
  }

  /**
   * @Route("/login", name="app_login")
   */
  public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
  {
    $user = $this->getUser();
    if ($user) {
      // Si l'utilisateur existe, on renvoie un clone de l'objet user sans son mot de passe au format JSON
      $userClone = clone $user;
      $userClone->setPassword('');

      $data = $this->serializer->serialize($userClone, JsonEncoder::FORMAT);

      return new JsonResponse($data, Response::HTTP_OK, [], true);
      //return $this->redirectToRoute('index', array('vueRouting' => 'home'));
    } else {
      // Sinon, on afficher le formulaire de login
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
