<?php

namespace Fridzema\FakerQuotes\Providers;

use Fridzema\FakerQuotes\Providers\Contracts\QuoteProviderInterface;

class QuoteProvider implements QuoteProviderInterface
{
    protected array $quotes = [];

    protected array $quotesByCategory = [];

    protected bool $isLoaded = false;

    public function __construct()
    {
        $this->loadQuotes();
    }

    protected function loadQuotes(): void
    {
        if ($this->isLoaded) {
            return;
        }

        $categories = [
            'inspirational',
            'funny',
        ];

        foreach ($categories as $category) {
            $path = __DIR__.'/../Data/'.$category.'.php';
            $loadedQuotes = array_map(function ($quote) use ($category) {
                $quote['category'] = $category;

                return $quote;
            }, require $path);

            $this->quotes = array_merge($this->quotes, $loadedQuotes);

            $catKey = strtolower($category);

            $this->quotesByCategory[$catKey] = array_merge($this->quotesByCategory[$catKey] ?? [], $loadedQuotes);
        }

        $this->isLoaded = true;
    }

    public function getQuote(?string $category = null): array
    {
        $filtered = $this->filterQuotesByCategory($category);

        return $this->randomQuote($filtered);
    }

    public function getQuoteText(?string $category = null): string
    {
        return $this->getQuote($category)['quote'];
    }

    public function getQuoteAuthor(?string $category = null): string
    {
        return $this->getQuote($category)['author'];
    }

    public function getFunnyQuote(): string
    {
        return $this->getQuoteText('funny');
    }

    public function getInspirationalQuote(): string
    {
        return $this->getQuoteText('inspirational');
    }

    protected function filterQuotesByCategory(?string $category): array
    {
        if ($category === null) {
            return $this->quotes;
        }

        $category = strtolower($category);

        return $this->quotesByCategory[$category] ?? [];
    }

    protected function randomQuote(array $quotes): array
    {
        if (empty($quotes)) {
            // Use all quotes if none found for a given category
            $quotes = $this->quotes;
        }

        $randomIndex = random_int(0, count($quotes) - 1);

        return $quotes[$randomIndex];
    }
}
