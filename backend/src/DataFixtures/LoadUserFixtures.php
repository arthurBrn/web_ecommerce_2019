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


class LoadUserFixtures extends Fixture
{

    /** @var OrderRepository $orderRepo */
    private $orderRepo;
    /** @var CartRepository $cartRepo */
    private $cartRepo;

    public function __construct(OrderRepository $orderRepository, CartRepository $cartRepository)
    {
        $this->orderRepo = $orderRepository;
        $this->cartRepo = $cartRepository;
    }

    /**
     * @inheritDoc
     */
    public function load(\Doctrine\Persistence\ObjectManager $manager)
    {
        $faker = Factory::create('EN_en');

        /** @var User $usr */
        $usr = new User();

        $usr
            ->setEmail($faker->email)
            ->setFirstName($faker->firstName)
            ->setLastName($faker->name)
            ->setBillingAddress($faker->address)
            ->setCountry($faker->country)
            ->setPassword($faker->password)
            ->setDeliveryAddress($faker->address)
            ->setOrders($this->orderRepo->findOneBy(['id', 1]))
            ->setCart(null)
        ;




        $manager->persist($usr);
        $manager->flush();
    }

}
