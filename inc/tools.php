<?php

function loadJSON() {
    // JSON lesen und decodieren
    $path = '../data/notes.json';
    $decodedJSON = is_file($path) ? json_decode(file_get_contents($path), true) : [];
    return $decodedJSON;
}

function saveJSON($data) {

    $jsonArray = []; 

    // Attribute aus Objekt ausnehmen, und im Array als String schreiben
    foreach ($data as $d) {
        $jsonArray[] = [
            'title'   => $d->getTitle(),
            'content' => $d->getContent()
        ];
    }
    file_put_contents('../data/notes.json',
    json_encode($jsonArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
  );
}

