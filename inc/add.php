<?php
declare(strict_types=1);

function addNewNote(){
    $newNote = new Note($_POST['title'], $_POST['content']);
    return $newNote;    
}

  
