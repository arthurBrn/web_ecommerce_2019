<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Product;
use App\Entity\SubCategorie;
use App\Entity\User;


class SubCategorieFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var SubCategorie $sub */
            $sub = new SubCategorie();
            /** @var Categorie $cat */
            $cat = new Categorie();
            $cat->setName($this->faker->generateFaker()->word);
            $sub
                ->setName($this->faker->generateFaker()->word)
                ->setCategorie($cat)
            ;
            $manager->persist($sub);
        }
        $manager->flush();
    }
}
