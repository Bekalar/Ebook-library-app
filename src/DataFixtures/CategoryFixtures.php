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
        $this->loadScienceEbooks($manager);
        $this->loadLanguageEbooks($manager);
        $this->loadLiteratureEbooks($manager);
    }

    // Functions for MainCategories and SubCategories
    private function loadMainCategoryData($manager)
    {
        foreach ($this->MainCategoryData() as [$name]) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
        }
        $manager->flush();
    }

    private function LoadSubcategoryData($manager, $category, $parent_id)
    {
        $parent = $manager->getRepository(Category::class)->find($parent_id);
        $methodName = "get{$category}Data";

        foreach ($this->$methodName() as [$name]) {
            $category = new Category();
            $category->setName($name);
            $category->setParent($parent);
            $manager->persist($category);
        }
        $manager->flush();
    }

    // Loading subcategories
    private function loadScienceEbooks($manager)
    {
        $this->LoadSubcategoryData($manager, 'Science', 1);
    }

    private function loadLanguageEbooks($manager)
    {
        $this->LoadSubcategoryData($manager, 'Language', 2);
    }

    private function loadLiteratureEbooks($manager)
    {
        $this->LoadSubcategoryData($manager, 'Literature', 3);
    }

    // Functions with data
    private function MainCategoryData()
    {
        return [
            ['Ebooki naukowe', 1],
            ['Ebooki językowe', 2],
            ['Ebooki literatura', 3],
        ];
    }

    private function getScienceData()
    {
        return [
            ['Nauki ścisłe', 4],
            ['Nauki techniczne' , 5],
            ['Nauki humanistyczne', 6],
            ['Nauki ekonomiczne', 7],
            ['Nauki przyrodnicze i medyczne', 8],
            ['Nauki społeczne', 9],
            ['Pozostałe nauki' ,10]
        ];
    }

    private function getLanguageData()
    {
        return [
            ['Język angielski', 11],
            ['Język niemiecki', 12],
            ['Język franciski', 13],
            ['Język hiszpański', 14],
            ['Język rosyjski', 15],
            ['Język włoski', 16],
            ['Język łaciński', 17],
            ['Język japoński', 18],
            ['Pozostałe języki', 19],
        ];
    }

    private function getLiteratureData()
    {
        return [
            ['Fantastyka', 20],
            ['Kryminał', 21],
            ['Sensacja', 22],
            ['Thriller', 23],
            ['Poezja i dramat', 24],
            ['Proza', 25],
            ['Powieść biograficzna', 26],
            ['Powieść obyczajowa', 27],
            ['Powieść psychologiczna', 28],
            ['Literatura dla młodszych', 29],
            ['Pozostałe', 30],
        ];
    }
}
