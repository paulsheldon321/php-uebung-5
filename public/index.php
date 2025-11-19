<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);
/**
 * Aufgabe:
 * 0) Einer von Euch legt ein öffentliches Git-Repo an von wo aus Ihr alle pushen und pullen könnt (optional aber hilfreich)
 * 1) Erstelle die Struktur: data/, inc/, class/, public/
 * 2) Lade Notizen aus data/notes.json und zeige sie in public/index.php.
 * 3) Implementiere add.php und delete.php (POST) Hinweis: verstecktes Formularfeld.
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
$path = __DIR__ . '/data/notes.json';
$notes = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];

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
        <?php if ($notes): ?>
            <?php foreach ($notes as $note): ?>
                <article class="post">
                    <h2><?= htmlspecialchars($note['title']) ?></h2>
                    <p><?= htmlspecialchars($note['content']) ?></p>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Keine Notizen</p>
        <?php endif; ?>
    </main>
</body>

</html>