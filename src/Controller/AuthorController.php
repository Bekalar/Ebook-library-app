<?php

namespace App\Controller;

use App\Entity\Ebook;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author/{author}', name: 'app_author')]
    public function index(EntityManagerInterface $manager, $author): Response
    {
        $ebooks = $manager->getRepository(Ebook::class)->findBy(['author' => $author]);
        return $this->render('author/index.html.twig', [
            'ebooks' => $ebooks,
            'author' => $author,
        ]);
    }
}
