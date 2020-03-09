<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;


class ProductFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {
            /** @var Product $prod */
            $prod = new Product();
            $prod
                ->setId($i)
                ->setName($this->faker->generateFaker()->word)
                ->setDescription($this->faker->generateFaker()->text)
                ->setListingPicture($this->faker->generateFaker()->imageUrl())
                ->setCategorie($this->catRepo->findOneBy(["id", rand(1,10)]))
                ->setCharacteristic($this->characteristicRepo->findOneBy(["id", rand(1,10)]))
                ;
            $manager->persist($prod);
        }
        $manager->flush();
    }
}
