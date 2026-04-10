
<?php

namespace Fridzema\FakerQuotes;

use Faker\Factory;
use Faker\Generator;
use Fridzema\FakerQuotes\Providers\QuoteProvider;

class FakerQuotes
{
    public static function create(): Generator
    {
        $faker = Factory::create();
        $faker->addProvider(new QuoteProvider($faker));

        return $faker;
    }
}
