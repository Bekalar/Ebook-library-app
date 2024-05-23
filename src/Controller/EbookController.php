<?php

namespace App\Controller;

use App\Entity\Ebook;
use App\Form\EbookType;
use App\Repository\EbookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EbookController extends AbstractController
{
    #[Route('/ebooks', name: 'app_ebook')]
    public function index(EbookRepository $ebooks): Response
    {

        return $this->render('ebook/index.html.twig', [
            'ebooks' => $ebooks->findAll(),
        ]);
    }

    #[Route('/ebooks/{ebook}', name: 'app_ebook_show')]
    public function showOne(Ebook $ebook): Response
    {
        return $this->render('ebook/show.html.twig', [
            'ebook' => $ebook,
        ]);
    }

    #[Route('/ebooks/add', name: 'app_ebook_add', priority: 2)]
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $ebook = new Ebook;
        $form = $this->createForm(EbookType::class, $ebook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ebook = $form->getData();
            $manager->persist($ebook);
            $manager->flush();

            // Flash message
            $this->addFlash('success', 'You have successfully added an ebook.');

            return $this->redirectToRoute('app_ebook');
        }

        return $this->render('ebook/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ebooks/{ebook}/edit', name: 'app_ebook_edit')]
    public function edit(Ebook $ebook, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(EbookType::class, $ebook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ebook = $form->getData();
            $manager->persist($ebook);
            $manager->flush();

            // Flash message
            $this->addFlash('success', 'You have successfully updated an ebook.');

            return $this->redirectToRoute('app_ebook');
        }

        return $this->render('ebook/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
