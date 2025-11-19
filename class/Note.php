<?php
declare(strict_types=1);

class Note {
    /* Construcor Property Promotion */
    public function __construct(
        private string $title, 
        private string $content ) {
        // 
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle($newTitle) {
        return $this->title = $newTitle;
    }

    public function setContent() {
        return $this->content = $setContent;
    }
}