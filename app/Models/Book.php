<?php
class Book
{
    /** @var Chapter[] */
    private array $chapters = [];

    public function __construct(private string $title) {}

    public function addChapter(Chapter $chapter): void   // el capítulo llega de afuera
    {
        $this->chapters[] = $chapter;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getChapters(): array
    {
        return $this->chapters;
    }
}