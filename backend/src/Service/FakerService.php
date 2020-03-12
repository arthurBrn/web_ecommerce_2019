<?php

declare(strict_types=1);

namespace App\Service;


/**
 * Base class designed for data fixtures so they don't have to extend and
 * implement different classes/interfaces according to their needs.
 */
class FakerService
{
    public function generateFaker()
    {
        $faker = \Faker\Factory::create('En_en');

        return ($faker);
    }
}
