<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\SubCategorie;
use App\Entity\User;


class SubCategoriesFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            /** @var SubCategorie $sub */
            $sub = new SubCategorie();
            $sub->setId($i);
            $sub->setName($this->faker->generateFaker()->word);
            $sub->setCategorie($this->catRepo->findOneBy(["id", rand(2,10)]));
            $manager->persist($sub);
        }
        $manager->flush();
    }
}
