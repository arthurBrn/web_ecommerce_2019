<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Characteristic;
use App\Entity\Product;

class ProductsFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var Product $prod */
            $prod = new Product();
            /** @var Characteristic $characteristic */
            $characteristic = new Characteristic();
            /** @var Categorie $cat */
            $cat = new Categorie();

            $cat->setName($this->faker->generateFaker()->word);
            $characteristic
                ->setWidth(rand(1,10))
                ->setWeight(rand(1,10))
                ->setPrice(rand(1,10))
                ->setHeight(rand(1,10))
                ->setColor($this->faker->generateFaker()->colorName)
            ;
            $prod
                ->setName($this->faker->generateFaker()->name)
                ->setCategorie($cat)
                ->setCharacteristic($characteristic)
                ->setListingPicture($this->faker->generateFaker()->imageUrl())
                ->setDescription($this->faker->generateFaker()->text)
            ;
            $manager->persist($prod);
        }
        $manager->flush();
    }
}
