<?php

namespace App\Controller;

use App\Entity\Artists;
use App\Repository\ArtistsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/api/artists")
 */
class ArtistsController extends AbstractController
{
    /**
     * @Route("/", name="artists_index", methods={"GET"})
     */
    public function index(ArtistsRepository $artistsRepository, SerializerInterface $serializer): Response
    {
        $artists = $artistsRepository->findAll();

        // Pour pouvoir récupérer le(s) artiste(s) associés aux fans, il faut préciser ça :
        $context['circular_reference_handler'] = function ($object) {
            return $object->getId();
        };

        // Transformation de l'objet Doctrine en JSON
        $data = $serializer->serialize($artists, 'json', $context);

        $response = new Response(
            'Artists',
            Response::HTTP_OK,
            ['Content-type' => 'application/json']
        );
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/new", name="artists_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $artist = new Artists();
        $artist->setNickname($request->request->get('nickname'));
        $artist->setPhoto($request->request->get('photo'));
        $artist->setCategory($request->request->get('category'));
        $artist->setDescription($request->request->get('description'));
        $artist->setFacebookLink($request->request->get('facebook_link'));
        $artist->setTwitterLink($request->request->get('twitter_link'));
        $artist->setYoutubeLink($request->request->get('youtube_link'));
        $artist->setWordpressLink($request->request->get('wordpress_link'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($artist);
        $entityManager->flush();

        // Envoi de la réponse
        return new Response("Profil ajouté", Response::HTTP_OK, []);
    }

    /**
     * @Route("/{id}", name="artists_show", methods={"GET"})
     */
    public function show(Request $request, ArtistsRepository $artistsRepository, SerializerInterface $serializer): Response
    {
        // Récupération de la valeur de {id} à partir de la route
        $id = $request->get('id');
        $artist = $artistsRepository->findOneBy(['id' => $id]);

        // Pour pouvoir récupérer le(s) fan(s) associés à l'artiste, il faut préciser ça :
        $context['circular_reference_handler'] = function ($object) {
            return $object->getId();
        };

        $data = $serializer->serialize($artist, 'json', $context);
        $response = new Response(
            'Artist',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/{id}/edit", name="artists_edit", methods={"PUT"})
     */
    public function edit(Request $request, ArtistsRepository $artistsRepository): Response
    {
        // Récupération de la valeur de {id} à partir de la route
        $id = $request->get('id');

        $artist = $artistsRepository->findOneBy(['id' => $id]);
        // On redéfinit toutes les valeurs de l'artiste
        $artist->setNickname($request->request->get('nickname'));
        $artist->setPhoto($request->request->get('photo'));
        $artist->setCategory($request->request->get('category'));
        $artist->setDescription($request->request->get('description'));
        $artist->setFacebookLink($request->request->get('facebook_link'));
        $artist->setTwitterLink($request->request->get('twitter_link'));
        $artist->setYoutubeLink($request->request->get('youtube_link'));
        $artist->setWordpressLink($request->request->get('wordpress_link'));

        $this->getDoctrine()->getManager()->flush();

        // Envoi de la réponse
        return new Response("Profil modifié", Response::HTTP_OK, []);
    }

    /**
     * @Route("/{id}", name="artists_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ArtistsRepository $artistsRepository): Response
    {
        $id = $request->get('id');
        $artist = $artistsRepository->findOneBy(['id' => $id]);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($artist);
        $entityManager->flush();

        if (!$artistsRepository->findOneBy(['id' => $id])) {
            // Envoi de la réponse
            return new Response("Profil supprimé", Response::HTTP_OK, []);
        } else {
            return new Response("Echec de la suppression du profil", 500, []);
        }
    }
}
