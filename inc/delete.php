<?php

declare(strict_types=1);
include_once __DIR__ . '/tools.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid access');
}

$id = $_POST['id'] ?? null;

if ($id === null || !is_numeric($id)) {
    die('Ungültige Notiz-ID.');
}

$notes = loadNotes();


if (!array_key_exists((int)$id, $notes)) {
    die('Notiz existiert nicht.');
}

// Remove 
unset($notes[(int)$id]);

// Reindex array to avoid gaps
$notes = array_values($notes);

saveNotes($notes);

// Redirect
header('Location: ../public/index.php');
exit;
