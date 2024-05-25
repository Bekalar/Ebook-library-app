<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Ebook;
use App\Utils\CategoryTreeFrontPage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/ebooks/search/{categoryname},{id}', name: 'app_category')]
    public function index(EntityManagerInterface $manager, CategoryTreeFrontPage $tree, $id, $categoryname): Response
    {
        $categories = $tree->buildTree();
        $tree->getCategoryListAndParent($id);
        $ids = $tree->getChildIds($id);
        array_push($ids, $id);
        $ebooks = $manager->getRepository(Ebook::class)->findChildCategory($ids);
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'ebooks' => $ebooks,
            'categories' => $categories,
            'categoryname' => $categoryname,
        ]);
    }
}
