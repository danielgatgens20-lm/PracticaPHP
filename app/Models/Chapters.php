<?php
class Chapter
{
    /** @var Paragraph[] */
    private array $paragraphs = [];

    public function __construct(private string $title) {}

    public function addParagraph(): Paragraph
    {
        $paragraph = new Paragraph();      // composición: Chapter crea Paragraph
        $this->paragraphs[] = $paragraph;
        return $paragraph;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getParagraphs(): array
    {
        return $this->paragraphs;
    }
}