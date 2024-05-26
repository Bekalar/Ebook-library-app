<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->UserData() as [$email, $password]) {
            $user = new User;
            $user->setEmail($email);
            $user->setPassword($this->userPasswordHasher->hashPassword($user ,$password));
            $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function UserData()
    {
        return [
            ['bekalar@web.com', '123'],
        ];
    }
}
