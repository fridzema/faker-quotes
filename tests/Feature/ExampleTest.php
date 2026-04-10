<?php

use Faker\Factory;
use Fridzema\FakerQuotes\Providers\QuoteProvider;

it('generates a funny quote', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $quote = $faker->getFunnyQuote();

    expect($quote)->toBeString();
    expect(strlen($quote))->toBeGreaterThan(5);
});

it('generates an inspirational quote', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $quote = $faker->getInspirationalQuote();

    expect($quote)->toBeString();
    expect(strlen($quote))->toBeGreaterThan(5);
});

it('generates a programming quote', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $quote = $faker->getProgrammingQuote();

    expect($quote)->toBeString();
    expect(strlen($quote))->toBeGreaterThan(5);
});

it('generates a dad quote', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $quote = $faker->getDadQuote();

    expect($quote)->toBeString();
    expect(strlen($quote))->toBeGreaterThan(5);
});

it('generates a quote with a specific category', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $funnyQuote = $faker->getQuote('funny');
    $inspirationalQuote = $faker->getQuote('inspirational');
    $programmingQuote = $faker->getQuote('programming');

    expect($funnyQuote)->toBeArray();
    expect($funnyQuote['category'])->toBe('funny');

    expect($inspirationalQuote)->toBeArray();
    expect($inspirationalQuote['category'])->toBe('inspirational');

    expect($programmingQuote)->toBeArray();
    expect($programmingQuote['category'])->toBe('programming');

    $dadQuote = $faker->getQuote('dad');

    expect($dadQuote)->toBeArray();
    expect($dadQuote['category'])->toBe('dad');
});

it('handles unknown categories gracefully', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $quote = $faker->getQuote();

    expect($quote)->toBeArray();
    // expect($quote['category'])->toBeOneOf(['funny', 'inspirational']);
});

arch()
    ->preset()
    ->php();

arch()
    ->preset()
    ->security();
