<?php

function loadJSON($path) {
    // JSON lesen und decodieren
    
    $decodedJSON = is_file($path) ? json_decode(file_get_contents($path), true) : [];
    $arrayJSON = [];
    if ($decodedJSON == null) {
        return [];
    } else {
        foreach ($decodedJSON as $item) {
            if (!isset($item['title'], $item['content'])) continue;
            $arrayJSON[] = new Note(
                $item['title'],
                $item['content']
            );
        }        
        return $arrayJSON;
    }

}

function saveJSON($data, $path) {

    $jsonArray = []; 

    // Attribute aus Objekt rausnehmen, und in Array als String schreiben
    foreach ($data as $d) {
        $jsonArray[] = [
            'title'   => $d->getTitle(),
            'content' => $d->getContent()
        ];
    }
    file_put_contents($path,
    json_encode($jsonArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
  );
}

