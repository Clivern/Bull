<?php

namespace App\DataFixtures;

use App\Entity\Config;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ConfigFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $config = new Config();
        $config->setName("_app_name");
        $config->setValue("Bull");
        $config->setAutoload(true);
        $config->setCreatedAt(new \DateTime());
        $config->setUpdatedAt(new \DateTime());
        $manager->persist($config);
        $manager->flush();
    }
}
