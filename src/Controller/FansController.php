<?php

namespace App\Controller;

use App\Entity\Fans;
use App\Form\FansType;
use App\Repository\FansRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fans")
 */
class FansController extends AbstractController
{
    /**
     * @Route("/", name="fans_index", methods={"GET"})
     */
    public function index(FansRepository $fansRepository): Response
    {
        return $this->render('fans/index.html.twig', [
            'fans' => $fansRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fans_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fan = new Fans();
        $form = $this->createForm(FansType::class, $fan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fan);
            $entityManager->flush();

            return $this->redirectToRoute('fans_index');
        }

        return $this->render('fans/new.html.twig', [
            'fan' => $fan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fans_show", methods={"GET"})
     */
    public function show(Fans $fan): Response
    {
        return $this->render('fans/show.html.twig', [
            'fan' => $fan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fans_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fans $fan): Response
    {
        $form = $this->createForm(FansType::class, $fan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fans_index');
        }

        return $this->render('fans/edit.html.twig', [
            'fan' => $fan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fans_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fans $fan): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fans_index');
    }
}
