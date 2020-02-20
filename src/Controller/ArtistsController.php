<?php

namespace App\Controller;

use App\Entity\Artists;
use App\Form\ArtistsType;
use App\Repository\ArtistsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/artists")
 */
class ArtistsController extends AbstractController
{
    /**
     * @Route("/", name="artists_index", methods={"GET"})
     */
    public function index(ArtistsRepository $artistsRepository): Response
    {
        return $this->render('artists/index.html.twig', [
            'artists' => $artistsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="artists_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $artist = new Artists();
        $form = $this->createForm(ArtistsType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($artist);
            $entityManager->flush();

            return $this->redirectToRoute('artists_index');
        }

        return $this->render('artists/new.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artists_show", methods={"GET"})
     */
    public function show(Artists $artist): Response
    {
        return $this->render('artists/show.html.twig', [
            'artist' => $artist,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="artists_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Artists $artist): Response
    {
        $form = $this->createForm(ArtistsType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artists_index');
        }

        return $this->render('artists/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="artists_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Artists $artist): Response
    {
        if ($this->isCsrfTokenValid('delete' . $artist->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($artist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('artists_index');
    }
}
