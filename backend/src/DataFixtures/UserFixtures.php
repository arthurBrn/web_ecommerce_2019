<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Characteristic;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\CartRepository;
use App\Repository\OrderRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping as ORM;
use Faker\Factory;


class UserFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var User $usr */
            $usr = new User();
            $usr
                ->setEmail($this->faker->generateFaker()->email)
                ->setFirstName($this->faker->generateFaker()->firstName)
                ->setLastName($this->faker->generateFaker()->name)
                ->setBillingAddress($this->faker->generateFaker()->address)
                ->setCountry($this->faker->generateFaker()->country)
                ->setPassword($this->faker->generateFaker()->password)
                ->setDeliveryAddress($this->faker->generateFaker()->address)
                ->setOrders(null)
                ->setCart(null);
            $manager->persist($usr);
        }
        $manager->flush();
    }
}
