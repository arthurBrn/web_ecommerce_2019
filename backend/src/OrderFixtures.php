<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\User;


class OrderFixtures extends AbstractFixtures
{

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        for ($i = 1; $i < 10; $i++) {
            /** @var Order $order */
            $order = new Order();
            $order
                ->setActif(false)
                ->setShippingMethod($this->faker->generateFaker()->word)
                ->setOrderWeight(rand(2,100))
                ->setShippingFee(rand(2,100))
                ->setShippingFee(rand(2,100))
            ;
            $manager->persist($order);
        }
        $manager->flush();
    }
}
