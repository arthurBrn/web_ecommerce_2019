<?php

namespace App\DataFixtures;

use App\Repository\CategorieRepository;
use App\Repository\CharacteristicRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Service\FakerService;


Abstract class AbstractFixtures extends Fixture 
{
    public $faker;

    /** @var CategorieRepository $catRepo */
    public $catRepo;
    /** @var CharacteristicRepository $characteristicRepo */
    public $characteristicRepo;

    public function __construct(
        FakerService $injectedFaker,
        CategorieRepository $categorieRepository,
        CharacteristicRepository $characteristicRepository
    )
    {
        $this->faker = $injectedFaker;
        $this->catRepo = $categorieRepository;
        $this->characteristicRepo = $characteristicRepository;
    }
}
