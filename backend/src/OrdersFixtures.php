<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Characteristic;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class OrdersFixtures extends AbstractFixtures
{
    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var Order $order */
            $order = new Order();
            /** @var User $user */
            $user = new User();
            /** @var Product $product */
            $product = new Product();
            /** @var Characteristic $char */
            $char = new Characteristic();
            /** @var Categorie $cat */
            $cat = new Categorie();

            $cat->setName($this->faker->generateFaker()->word);
            $char
                ->setWidth(rand(1,10))
                ->setWeight(rand(1,10))
                ->setPrice(rand(1,10))
                ->setHeight(rand(1,10))
                ->setColor($this->faker->generateFaker()->colorName)
            ;
            $user
                ->setEmail($this->faker->generateFaker()->email)
                ->setRoles([])
                ->setPassword($this->faker->generateFaker()->password)
                ->setFirstName($this->faker->generateFaker()->word)
                ->setLastName($this->faker->generateFaker()->word)
                ->setCountry($this->faker->generateFaker()->country)
                ->setBillingAddress($this->faker->generateFaker()->address)
                ->setDeliveryAddress($this->faker->generateFaker()->address)
                ->setCart(null)
            ;
            $product->setId(rand(500, 1000));
            $product->setName($this->faker->generateFaker()->word);
            $product->setDescription($this->faker->generateFaker()->text);
            $product->setListingPicture($this->faker->generateFaker()->imageUrl());
            $product->setCharacteristic($char);
            $product->setCategorie($cat);

            $order
                ->setActif(0)
                ->setShippingMethod($this->faker->generateFaker()->text(200))
                ->setOrderWeight((rand(2,100) / 10))
                ->setShippingFee((rand(2,100) / 10))
            ;

            // ->addUser($user)

            $manager->persist($order);
        }
        $manager->flush();
    }
}
