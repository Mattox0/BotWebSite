<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Admin extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setUsername('Mattox');
        $admin->setEmail('mattox@exemple.com');
        $password = password_hash("password", PASSWORD_DEFAULT);
        $admin->setPassword($password);
        $manager->persist($admin);
        $manager->flush();
    }
}