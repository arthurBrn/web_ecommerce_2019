<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Characteristic;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping as ORM;
use Faker\Factory;


class AppFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $faker = Factory::create('EN_en');

        /** @var Categorie $categorie */
        $categorie = new Categorie();

        for ($i = 0; $i <= 10; $i++) {
            $categorie->setName($faker->word());
            $manager->persist($categorie);
            $manager->flush();
        }
    }

}
