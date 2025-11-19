<?php

function deleteNote($data, $deleteId){

    foreach ($data as $index => $object) {
    if ($object->getId() == $deleteId) {
        unset($data[$index]);
        break;  // ออกจากลูป เพราะเจอแล้ว
    }
    }

    // เรียง index ใหม่ให้เป็น 0,1,2,...
    $data = array_values($data);

    return $data;

}