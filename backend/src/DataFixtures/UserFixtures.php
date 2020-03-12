<?php

namespace App\DataFixtures;

use App\Entity\User;

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
                ;
            $manager->persist($usr);
        }
        $manager->flush();
    }
}
