<?php
declare(strict_types=1);

class Note {
    private static int $nextId = 1;
    private int $id;
    private string $title;
    private string $content;

    public function __construct(string $title, string $content)
    {
        $this->id = self::$nextId;
        self::$nextId++;

        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getID() {
        return $this->id;
    }

}