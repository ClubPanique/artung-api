<?php

namespace App\Controller;

use App\Entity\Fans;
use App\Form\FansType;
use App\Repository\FansRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/fans")
 */
class FansController extends AbstractController
{
    /**
     * @Route("/", name="fans_index", methods={"GET"})
     */
    public function index(FansRepository $fansRepository, SerializerInterface $serializer): Response
    {
        $fans = $fansRepository->findAll();
        // Transformation de l'objet Doctrine en JSON
        $data = $serializer->serialize($fans, 'json');

        $response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/new", name="fans_new", methods={"POST"})
     */
    public function new(Request $request): Response
    {
        $fan = new Fans();
        $fan->setEmail($request->request->get('email'));
        $fan->setNickname($request->request->get('nickname'));
        $fan->setPhoto($request->request->get('photo'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($fan);
        $entityManager->flush();

        // Envoi d'une reponse avec un statut 200
        return new Response(null, 200, []);
    }

    /**
     * @Route("/{id}", name="fans_show", methods={"GET"})
     */
    public function show(Request $request, FansRepository $fansRepository, SerializerInterface $serializer): Response
    {
        // Récupération de la valeur de {id} à partir de la route
        $id = $request->get('id');

        $fan = $fansRepository->findOneBy(['id' => $id]);
        $data = $serializer->serialize($fan, 'json');
        $response = new Response(
            'Content',
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/{id}/edit", name="fans_edit", methods={"PUT"})
     */
    public function edit(Request $request, FansRepository $fansRepository): Response
    {
        // Récupération de la valeur de {id} à partir de la route
        $id = $request->get('id');

        $fan = $fansRepository->findOneBy(['id' => $id]);
        // On redéfinit toutes les valeurs du fan
        $fan->setEmail($request->request->get('email'));
        $fan->setNickname($request->request->get('nickname'));
        $fan->setPhoto($request->request->get('photo'));

        $this->getDoctrine()->getManager()->flush();

        // Envoi d'une reponse avec un statut 200
        return new Response(null, 200, []);
    }

    /**
     * @Route("/{id}", name="fans_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fans $fan): Response
    {
        if ($this->isCsrfTokenValid('delete' . $fan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fans_index');
    }
}
