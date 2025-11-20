<?php

declare(strict_types=1);
include_once __DIR__ . '/../class/Note.php';
const NOTES_FILE = __DIR__ . '/../data/notes.json';


function loadNotes(): array
{
    if (!is_file(NOTES_FILE)) {
        return [];
    }
    $raw = json_decode((string)file_get_contents(NOTES_FILE), true);
    if (!is_array($raw)) {
        return [];
    }
    $notes = [];
    foreach ($raw as $item) {
        $notes[] = new Note($item['title'], $item['content']);
    }
    return $notes;
}


function saveNotes(array $notes): void
{
    $toStore = [];
    foreach ($notes as $note) {
        $toStore[] = [
            'title'   => $note->getTitle(),
            'content' => $note->getContent(),
        ];
    }
    file_put_contents(NOTES_FILE, json_encode($toStore, JSON_PRETTY_PRINT));
}
