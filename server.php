<?php

// impostiamo l'header
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

// leggiamo il file riga per riga
$rows = [];
foreach (file('data.txt') as $line) {
    $rows[] = trim($line);
}

// invio del messaggio
echo "data: " . json_encode($rows) . "\n\n";