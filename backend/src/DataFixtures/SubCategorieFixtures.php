<?php

namespace App\DataFixtures;

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
            $sub
                ->setName($this->faker->generateFaker()->word)
                ->setCategorie($this->catRepo->findOneBy(["id", rand(1,10)]))
            ;
            $manager->persist($sub);
        }
        $manager->flush();
    }
}
