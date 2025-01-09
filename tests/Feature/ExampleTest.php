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

it('generates a quote with a specific category', function () {
    $faker = Factory::create();
    $faker->addProvider(new QuoteProvider($faker));

    $funnyQuote = $faker->getQuote('funny');
    $inspirationalQuote = $faker->getQuote('inspirational');

    expect($funnyQuote)->toBeArray();
    expect($funnyQuote['category'])->toBe('funny');

    expect($inspirationalQuote)->toBeArray();
    expect($inspirationalQuote['category'])->toBe('inspirational');
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
