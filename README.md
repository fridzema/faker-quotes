## Description
A custom Faker provider for generating inspirational and funny quotes.

A sprinkle of inspiration, a dash of humor, and a pinch of wisdom. This package provides a custom Faker provider for generating inspirational and funny quotes. It includes a collection of quotes from various categories, such as funny, inspirational, and more to be added later.


## Installation
```bash
composer require fridzema/faker-quotes --dev
```

## Running Tests

To run the tests, use the following command:

```bash
./vendor/bin/pest
```

## Usage

```php
<?php

require 'vendor/autoload.php';

$faker = Faker\Factory::create();
$faker->addProvider(new \Fridzema\FakerQuotes\QuotesProvider($faker));

echo $faker->getQuote(); // ['quote' => '...', 'author' => '...', 'category' => '...']
echo $faker->getQuoteText(); // 'Lorem ipsum dolor sit amet'
echo $faker->getQuoteAuthor(); // 'Author Name'
echo $faker->getFunnyQuote(); // ['quote' => '...', 'author' => '...', 'category' => 'funny']
echo $faker->getInspirationalQuote(); // ['quote' => '...', 'author' => '...', 'category' => 'inspirational']
```

## Available Methods
- getQuote(?string $category = null): array
- getQuoteText(?string $category = null): string
- getQuoteAuthor(?string $category = null): string
- getFunnyQuote(): string
- getInspirationalQuote(): string

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss changes.

## License

This project is licensed under the MIT License.

## Documentation

For more information, visit the [official documentation](https://github.com/fridzema/faker-quotes).