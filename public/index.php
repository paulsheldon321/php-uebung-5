<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

$path = __DIR__ . 'inc/tools.php';
$notes = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];
/**
 * Aufgabe:
 * 0) Einer von Euch legt ein öffentliches Git-Repo an von wo aus Ihr alle pushen und pullen könnt (optional aber hilfreich)
 * 1) Erstelle die Struktur: data/, inc/, class/, public/
 * 2) Lade Notizen aus data/notes.json und zeige sie in public/index.php.
 * 3) Implementiere add.php und delete.php (POST) Hinweis: verstecktes Formularfeld.
 * 4) index.php:
 * 4) index.php (Grundgerüst wie hier in dieser Datei):
 *    - Ausgabe der Notizen (wenn leeres Array: Info ausgeben)
 *    - Formular zum Hinzufügen neuer Notizen
 *    - Formular zum Löschen der entsprechenden Notiz (<input type="hidden">)
 * 5) inc/tools.php
 *    - Funktionen zum Laden, Speichern und Laden der Notizen
 * 6) add.php
 *    - Funktionalität zum Hinzufügen neuer Notizen
 * 7) delete.php
 *    - Funtionalität zum Löschen einer Notiz
 * 8) class/Note.php
 *    - Klasse für Notizen
 */
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
        <!-- Formular zum Hinzufügen neuer Notizen -->

        <form action="../inc/add.php" method="Post">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">

            <label for="content">Inhalt</label>
            <textarea name="content" id="content" rows="5"></textarea>

            <button type="submit" name="button">Notiz Hinzufügen</button>
        </form>

        <!-- Formular zum Löschen der entsprechenden Notiz (<input type="hidden">) -->
        <form action="../inc/delete.php" method="Post">
            <input type="hidden" name="">
            <button type="submit">Löschen</button>

        </form>

        <!-- Ausgabe der Notizen (wenn leeres Array: Info ausgeben) -->
        <?php if (empty($notes)): ?>
            <p>Keine Notizen vorhandeln.</p>
        <?php else: ?>
            <?php foreach ($notes as $n): ?>
                <article class="post">
                    <h2><?= htmlspecialchars($n['title']) ?></h2>
                    <p><?= nl2br(htmlspecialchars($n['content'])) ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>



    </main>


</body>

</html>