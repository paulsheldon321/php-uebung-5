<?php

declare(strict_types=1);

include_once __DIR__ . '/tools.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid access');
}

$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($title === '' || $content === '') {
    die('Titel und Inhalt dürfen nicht leer sein.');
}

// loading
$notes = loadNotes();

// note adden
$notes[] = new Note($title, $content);

// Saving
saveNotes($notes);

// Redirect 
header('Location: ../public/index.php');
exit;
