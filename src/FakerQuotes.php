
<?php

namespace Fridzema\FakerQuotes;

use Faker\Factory;
use Fridzema\FakerQuotes\Providers\QuoteProvider;

class FakerQuotes
{
    public static function create(): \Faker\Generator
    {
        $faker = Factory::create();
        $faker->addProvider(new QuoteProvider($faker));

        return $faker;
    }
}
