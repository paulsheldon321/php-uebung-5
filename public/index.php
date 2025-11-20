<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);



require_once dirname(__DIR__) . '/class/Note.php';
require_once dirname(__DIR__) . '/inc/tools.php';
require_once dirname(__DIR__) . '/inc/add.php';
require_once dirname(__DIR__) . '/inc/delete.php';

$pathJSON = dirname(__DIR__) . '/data/notes.json';
$notesJSONArray = loadJSON($pathJSON);

echo print_r($_POST);

if ( isset($_POST['add'] )) {
    // Fügt Note(Obj) im Array hinzu
    $notesJSONArray[] = addNewNote();
    saveJSON($notesJSONArray, $pathJSON);
    header("Location: index.php"); // vermeidet die Wiederholung der Eingabe nachdem der Browser neu geladet wird.
}

if ( isset($_POST['delete'] )) {
    $notesJSONArray = deleteNote($notesJSONArray, $_POST['deleteID']);
    saveJSON($notesJSONArray, $pathJSON);
    header("Location: index.php"); // vermeidet die Wiederholung der Eingabe nachdem der Browser neu geladet wird.
}

?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Übung 5 – Notiz-Manager Light</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header>
        <h1>Übung 5 – Notiz-Manager Light</h1>
    </header>
    <main class="container">
        <!-- TODO --> 

        <?php if($notesJSONArray === []): ?>
            <?php
                echo "<div class=\"alert\"> Keine Notiz - Bitte Info ausgeben </div>";
            ?>
        <?php else: ?>
            <?php foreach($notesJSONArray as $a => $n): ?>
                <article class="post">
                    <h2><?= $n->getID().". ". htmlspecialchars($n->getTitle()) ?></h2>
                    <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>


        <div class="card">
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
                <label for="title">Title</label>
                <input name="title">
                <label  for="content">Content</label>
                <input type="text" name="content">
                <button type="submit" name="add" style="margin: 1em 0 1em 0;" >Hinzufügen</button>
            </form>
        </div>

        <div class="card">
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">    
                <label for="deleteID">Notiz-Nummer</label>
                <input type="text" name="deleteID">
                <button type="submit" name="delete" style="margin: 1em 0 1em 0;">Löschen</button> 
            </form>
        </div> 
        
        
    </main>
</body>

</html>