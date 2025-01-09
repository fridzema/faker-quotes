<?php

namespace Fridzema\FakerQuotes\Providers\Contracts;

interface QuoteProviderInterface
{
    /**
     * Retrieve a random quote (with quote text and author) from a given category or from all categories if none specified.
     *
     *
     * @return array { 'quote' => string, 'author' => string }
     */
    public function getQuote(?string $category = null): array;

    /**
     * Retrieve only the quote text from a given category or from all categories if none specified.
     */
    public function getQuoteText(?string $category = null): string;

    /**
     * Retrieve only the quote author from a given category or from all categories if none specified.
     */
    public function getQuoteAuthor(?string $category = null): string;

    /**
     * Retrieve a random funny quote text.
     */
    public function getFunnyQuote(): string;

    /**
     * Retrieve a random inspirational quote text.
     */
    public function getInspirationalQuote(): string;
}
