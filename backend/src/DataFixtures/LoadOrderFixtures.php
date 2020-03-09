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
        /** @var Characteristic $characteristique */
        $characteristique = new Characteristic();
        /** @var Product $product */
        $product = new Product();

        $categorie
            ->setName($faker->word());
        $manager->persist($categorie);
        $characteristique
            ->setColor($faker->colorName)
            ->setHeight(rand(1,10))
            ->setPrice(rand(10,1000))
            ->setWeight(rand(1,10))
            ->setWidth(rand(1,10))
        ;
        $manager->persist($characteristique);
        $product
            ->setName($faker->word())
            ->setDescription($faker->paragraph())
            ->setListingPicture($faker->imageUrl())
            ->setCategorie($categorie)
            ->setCharacteristic($characteristique)
        ;
        $manager->persist($product);
        $manager->flush();
    }

}
