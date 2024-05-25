<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadMainCategoryData($manager);
    }

    private function loadMainCategoryData($manager)
    {
        foreach ($this->MainCategoryData() as [$name]) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
        }
        $manager->flush();
    }

    private function MainCategoryData()
    {
        return [
            ['Ebooki naukowe', 1],
            ['Ebooki językowe', 2],
            ['Ebooki literatura', 3], 
        ];
    }
}
