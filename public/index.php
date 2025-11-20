<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', true);

include_once __DIR__ . '/../class/Note.php';

$path = __DIR__ . '/../data/notes.json';
$data = is_file($path) ? json_decode((string)file_get_contents($path), true) : [];

$notes = [];
foreach ($data as $item) {
    $notes[] = new Note($item['title'], $item['content']);
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
        <!-- Formular zum Hinzufügen neuer Notizen -->
        <section>
            <form action="../inc/add.php" method="post">
                <h2>Neue Notiz erstellen</h2>
                <label for="title">Titel</label>
                <input type="text" name="title" id="title" required>
                <label for="content">Inhalt</label>
                <textarea name="content" id="content" rows="5" required></textarea>
                <button type="submit">Notiz hinzufügen</button>
            </form>
        </section>
        <hr>
        <!-- Ausgabe der Notizen -->
        <?php if (empty($notes)): ?>
            <p>Keine Notizen vorhanden.</p>

        <?php else: ?>
            <section>
                <h2>Gespeicherte Notizen</h2>
                <?php foreach ($notes as $i => $n): ?>
                    <article class="post">
                        <h2><?= htmlspecialchars($n->getTitle()) ?></h2>
                        <p><?= nl2br(htmlspecialchars($n->getContent())) ?></p>
                        <!-- Löschen-Formular -->
                        <form action="../inc/delete.php" method="post">
                            <input type="hidden" name="id" value="<?= $i ?>">
                            <button type="submit">Löschen</button>
                        </form>
                    </article>
                <?php endforeach; ?>
            </section>
        <?php endif; ?>
    </main>
</body>

</html>