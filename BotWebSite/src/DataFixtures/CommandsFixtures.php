<?php

namespace App\DataFixtures;

use App\Entity\Command;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommandsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $filedata = file_get_contents('./public/commands.json');
        $details = json_decode($filedata, true);

        foreach ($details as $catN => $cat) {
            foreach ($cat as $cmdN => $cmd) {
                $command = new Command();
                $command->setCategory($catN);
                $command->setName($cmdN);
                $command->setDescription($cmd['description']);
                $command->setExample($cmd['usage']);
                $command->setHidden($cmd['hidden']);
                $manager->persist($command);
            }
        }

        $manager->flush();
    }
}
