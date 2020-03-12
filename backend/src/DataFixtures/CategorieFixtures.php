<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Product;
use App\Entity\User;


class CategorieFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var Categorie $cat */
            $cat = new Categorie();
            $cat
                ->setName($this->faker->generateFaker()->word)
            ;
            $manager->persist($cat);
        }
        $manager->flush();
    }
}
