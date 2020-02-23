<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Fans;
use App\Entity\Artists;
use App\Form\RegistrationFormType;
use App\Security\UserAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/api/register/{type}", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, UserAuthenticator $authenticator): Response
    {
        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $nickname = $form->get('nickname')->getData();
            // On récupère le type de compte (artist ou fan) pour définir le role
            $type = $request->get('type');
            if ($type == 'artist') {
                $user->setRoles(['ROLE_ARTIST']);
                // On crée un nouvel artiste et on l'associe au user.
                $artist = new Artists();
                $artist->setNickname($nickname);
                $user->setArtist($artist);
            } else if ($type == 'fan') {
                $user->setRoles(['ROLE_FAN']);
                $fan = new Fans();
                $fan->setNickname($nickname);
                $user->setFan($fan);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
