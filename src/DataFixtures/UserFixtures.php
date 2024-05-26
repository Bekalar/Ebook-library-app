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
        foreach ($this->AdminData() as [$email, $password]) {
            $user = new User;
            $user->setEmail($email);
            $user->setPassword($this->userPasswordHasher->hashPassword($user ,$password));
            $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

            $manager->persist($user);
        }

        foreach ($this->UserData() as [$email2, $password2]) {
            $user2 = new User;
            $user2->setEmail($email2);
            $user2->setPassword($this->userPasswordHasher->hashPassword($user2 ,$password2));
            $user2->setRoles(['ROLE_USER']);

            $manager->persist($user2);
        }

        $manager->flush();
    }

    private function AdminData()
    {
        return [
            ['bekalar@web.com', '123'],
        ];
    }

    private function UserData()
    {
        return [
            ['robert@email.com', '321'],
        ];
    }
}
