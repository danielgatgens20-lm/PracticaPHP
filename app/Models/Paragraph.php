<?php
class Paragraph
{
    /** @var Sentence[] */
    private array $sentences = [];

    public function addSentence(string $text): Sentence
    {
        $sentence = new Sentence($text);   // composición: Paragraph crea Sentence
        $this->sentences[] = $sentence;
        return $sentence;
    }

    public function getSentences(): array
    {
        return $this->sentences;
    }
}
