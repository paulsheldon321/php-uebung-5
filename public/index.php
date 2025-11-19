<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Aufgabe:
 * ✅ 0) Einer von Euch legt ein öffentliches Git-Repo an von wo aus Ihr alle pushen und pullen könnt (optional aber hilfreich)
 * ✅ 1) Erstelle die Struktur: data/, inc/, class/, public/
 * ✅ 2) Lade Notizen aus data/notes.json und zeige sie in public/index.php.
 * 🟡 3) Implementiere add.php und delete.php (POST) Hinweis: verstecktes Formularfeld.
 * 🟡 4) index.php (Grundgerüst wie hier in dieser Datei):
 * ✅ - Ausgabe der Notizen (wenn leeres Array: Info ausgeben)
 *    - Formular zum Hinzufügen neuer Notizen
 *    - Formular zum Löschen der entsprechenden Notiz (<input type="hidden">)
 * 🟡 5) inc/tools.php
 *    - Funktionen zum Laden, Speichern und Laden der Notizen
 * 🟡 6) add.php
 *    - Funktionalität zum Hinzufügen neuer Notizen
 * 🟡 7) delete.php
 *    - Funtionalität zum Löschen einer Notiz
 * ✅ 8) class/Note.php
 *    - Klasse für Notizen
 */

require_once dirname(__DIR__) . '/class/Note.php';
require_once dirname(__DIR__) . '/inc/tools.php';
// require dirname(__DIR__) . '/inc/add.php';

//unset($_POST);

// Prüfe, ob diese Datei über ein Formular aufgerufen wurde
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
  echo '<pre>', print_r( $_POST ), '</pre>';
  $newNote = new Note($_POST['title'], $_POST['content']);
  //$newNote->setTitle();
  //$newNote->setContent();
  
  $notesJSONObject[] = $newNote;

  file_put_contents(
    '../data/notes.json',
    json_encode($notesJSONObject, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);
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

        <?php if($notesJSONObject === []): ?>
            <?php
                echo "<div class=\"alert\"> Keine Notiz - Bitte Info ausgeben </div>";
            ?>
        <?php else: ?>
            <?php foreach($notesJSONObject as $n): ?>
                <article class="post">
                <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
                <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
        

        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" class="card">
            <div style = "display: flex;">
                 <button type="submit" style = "margin: 0.5em; width: 50%;" onclick="toggleOpen()">Hinzufügen</button>
                 <button type="submit" style = "margin: 0.5em; width: 50%;">Löschen</button> 
            </div> 
              <label type="hidden" for="title">Title</label>
              <input type="text" name="title">
              <label type="hidden" for="content">Content</label>
              <input type="text" name="content">
        </form>
        
        
    </main>
</body>

</html>