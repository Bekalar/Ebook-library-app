<?php

namespace App\Controller;

use App\Entity\Ebook;
use App\Repository\EbookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
}
