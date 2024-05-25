<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Ebook;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EbookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->EbookData() as [$title, $description, $author, $created, $filename, $category_id]) {
            $ebook = new Ebook;
            $ebook->setTitle($title);
            $ebook->setDescription($description);
            $ebook->setAuthor($author);
            $ebook->setCreated(new \DateTime($created));
            $ebook->setFilename($filename);
            $category = $manager->getRepository(Category::class)->find($category_id);
            $ebook->setCategory($category);

            $manager->persist($ebook);
        }
        $manager->flush();
    }

    private function EbookData()
    {
        return [
            ['Instalacje elektryczne', 'opis ksiązki', 'Henryk Makiewicz', '22-03-2024', 'adfegsdf', 5],
            ['Rysunek techniczny maszynowy', 'opis ksiązki', 'Tadeusz Dobrzański', '18-03-2024', 'fagsgdfh', 5],
            ['Elektrownie jądrowe', 'opis ksiązki', 'Jerzy Kubowski', '25-06-2023', 'ngkhdgfssdf', 5],
            ['Nowy poradnik majstra', 'opis ksiązki', 'Janusz Panas', '10-01-2021', 'ghsclawfsdg', 5],
            ['Obliczenia kwantowe dla każdego', 'opis ksiązki', 'Chris Bernhardt', '11-01-2021', 'ghsjdfssvyjtyu', 5],
            ['Praktyczne uczenie maszynowe', 'opis ksiązki', 'Marcin Szeliga', '05-04-2022', 'thsclawfsdg', 5],
            ['Akustyka w budownictwie', 'opis ksiązki', 'Jacek Nurzyński', '05-07-2023', 'acmpprvwrvldbd', 5],
            ['Teoria obwodów elektrycznych', 'opis ksiązki', 'Stanisław Bolkowski', '15-02-2024', 'ghsclawfsdg', 5],
            ['Balistyka dla snajperów', 'opis ksiązki', 'Jerzy A. Ejsmont', '25-08-2022', 'lhpmgjgwfsdg', 5],
            ['Mosty stalowe', 'opis ksiązki', 'Henryk Zobel, Thakaa Al-Khafaji', '30-09-2022', 'tyrhsclakouoipp', 5],
            ['Charnobyl i Fukushima', 'opis ksiązki', 'Tomasz Ilnicki', '01-04-2023', 'pfdrgosawdfyjvs', 5],
            ['Sieć średnich napięć', 'opis ksiązki', 'Witold Hoppel', '02-06-2024', 'sbpawdlbdopawud', 5],
            ['Innowacje w transporcie', 'opis ksiązki', 'Krystyna Wojewódzka-Król', '21-04-2024', 'adsibowaksd', 5],
            ['Sztuka argumentacji', 'opis ksiązki', 'Krzysztof Szymanek', '20-03-2023', 'sdgpqfjsal', 9],
            ['Geometria i trygonometria', 'opis ksiązki', 'Wojciech Guzicki', '05-05-2020', 'sgpasfjbapejfo', 4],
            ['Geometria analityczna', 'opis ksiązki', 'Wojciech Guzicki', '25-06-2023', 'dshdvespacasv', 4],
            ['Artmetyka i algebra', 'opis ksiązki', 'Wojciech Guzicki', '01-10-2021', 'caojescsrbdsr', 4],
            ['Pan Tadeusz', 'opis ksiązki', 'Adam Mickiewicz', '02-11-2022', 'vsdcstbfnumg', 24],
            ['Konrad Wallenrod', 'opis ksiązki', 'Adam Mickiewicz', '21-03-2024', 'dtbfdtjspcbfygyf', 24],
            ['English Grammar in Use Book with Answers', 'opis ksiązki', 'Raymond Murphy', '30-03-2023', 'svdfviscpvjzdf', 11],
            ['Niemiecki Kein Problem', 'opis ksiązki', 'Waldemar Trambacz', '04-06-2021', 'savhrbspfse', 12],
            ['1984', 'opis ksiązki', 'George Orwell', '06-06-2020', 'ivdspaodksvvfdv', 25],
            ['The Great Gatsby', 'opis ksiązki', 'F.Scott Fitzgerald', '04-07-2020', 'fasfvrsfr', 27],
            
        ];
    }
}
