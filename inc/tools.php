<?php
    
// JSON lesen und decodieren
$path = '../data/notes.json';
$notesJSON = is_file($path)
    ? json_decode(file_get_contents($path), true)
    : [];


// JSON → Objekte
$notesJSONObject = [];

if ($notesJSON == null) {
} else {
    foreach ($notesJSON as $item) {
        if (!isset($item['title'], $item['content'])) continue;
        $notesJSONObject[] = new Note(
            $item['title'],
            $item['content']
        );
    }

}