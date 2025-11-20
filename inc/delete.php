<?php

function deleteNote($data, $deleteId){

    foreach ($data as $index => $object) {
    if ($object->getId() == $deleteId) {
        unset($data[$index]);
        break;  
    }
    }

    // Ordne die Indizes neu an (0, 1, 2, ...)
    $data = array_values($data);

    return $data;

}