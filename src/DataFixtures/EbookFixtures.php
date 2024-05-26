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
            ['Instalacje elektryczne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Henryk Makiewicz', '22-03-2024', 'adfegsdf', 5],
            ['Rysunek techniczny maszynowy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Tadeusz Dobrzański', '18-03-2024', 'fagsgdfh', 5],
            ['Elektrownie jądrowe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Jerzy Kubowski', '25-06-2023', 'ngkhdgfssdf', 5],
            ['Nowy poradnik majstra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Janusz Panas', '10-01-2021', 'ghsclawfsdg', 5],
            ['Obliczenia kwantowe dla każdego', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Chris Bernhardt', '11-01-2021', 'ghsjdfssvyjtyu', 5],
            ['Praktyczne uczenie maszynowe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Marcin Szeliga', '05-04-2022', 'thsclawfsdg', 5],
            ['Akustyka w budownictwie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Jacek Nurzyński', '05-07-2023', 'acmpprvwrvldbd', 5],
            ['Teoria obwodów elektrycznych', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Stanisław Bolkowski', '15-02-2024', 'ghsclawfsdg', 5],
            ['Balistyka dla snajperów', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Jerzy A. Ejsmont', '25-08-2022', 'lhpmgjgwfsdg', 5],
            ['Mosty stalowe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Henryk Zobel, Thakaa Al-Khafaji', '30-09-2022', 'tyrhsclakouoipp', 5],
            ['Charnobyl i Fukushima', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Tomasz Ilnicki', '01-04-2023', 'pfdrgosawdfyjvs', 5],
            ['Sieć średnich napięć', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Witold Hoppel', '02-06-2024', 'sbpawdlbdopawud', 5],
            ['Innowacje w transporcie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Krystyna Wojewódzka-Król', '21-04-2024', 'adsibowaksd', 5],
            ['Sztuka argumentacji', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Krzysztof Szymanek', '20-03-2023', 'sdgpqfjsal', 9],
            ['Geometria i trygonometria', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Wojciech Guzicki', '05-05-2020', 'sgpasfjbapejfo', 4],
            ['Geometria analityczna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Wojciech Guzicki', '25-06-2023', 'dshdvespacasv', 4],
            ['Artmetyka i algebra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Wojciech Guzicki', '01-10-2021', 'caojescsrbdsr', 4],
            ['Pan Tadeusz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Adam Mickiewicz', '02-11-2022', 'vsdcstbfnumg', 24],
            ['Konrad Wallenrod', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Adam Mickiewicz', '21-03-2024', 'dtbfdtjspcbfygyf', 24],
            ['English Grammar in Use Book with Answers', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Raymond Murphy', '30-03-2023', 'svdfviscpvjzdf', 11],
            ['Niemiecki Kein Problem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'Waldemar Trambacz', '04-06-2021', 'savhrbspfse', 12],
            ['1984', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'George Orwell', '06-06-2020', 'ivdspaodksvvfdv', 25],
            ['The Great Gatsby', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus accumsan ultrices. Sed eu accumsan nisl. Aliquam vel lectus molestie, consequat justo sed, ultrices sapien. Fusce dictum est in augue efficitur cursus. Sed tincidunt tempus mi vel dignissim. Aenean finibus ultricies egestas. Proin et erat vel est consequat commodo. Pellentesque leo odio, tristique et blandit nec, hendrerit nec tortor.', 'F.Scott Fitzgerald', '04-07-2020', 'fasfvrsfr', 27],
            
        ];
    }
}
