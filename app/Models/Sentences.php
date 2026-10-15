<?php

class Sentence
{
    /** @var string[] */
    private array $words = [];

    public function __construct(string $text)
    {
        // convierte "Hola mundo" en ["Hola", "mundo"]
        $this->words = explode(' ', trim($text));
    }

    public function getWords(): array
    {
        return $this->words;
    }

    public function countWords(): int
    {
        return count($this->words);
    }
}