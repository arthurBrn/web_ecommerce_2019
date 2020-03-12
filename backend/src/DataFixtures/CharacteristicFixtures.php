<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Characteristic;
use App\Entity\Product;

class CharacteristicFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var Characteristic $characteristic */
            $characteristic = new Characteristic();
            $characteristic
                ->setWidth(rand(1,10))
                ->setWeight(rand(1,10))
                ->setPrice(rand(1,10))
                ->setHeight(rand(1,10))
                ->setColor($this->faker->generateFaker()->colorName)
            ;
            $manager->persist($characteristic);
        }
        $manager->flush();
    }
}
