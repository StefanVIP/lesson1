<?php

require __DIR__ . '/001_cutString.php';
$data = [
    'short line',
    'what the fox say?',
    'very very very long line',
    'i dont know what to write here)',
    'QSOFT is great',
    'teacher is crazy',
    'qwertyqwertyqwertyqwerty',
];

$result = [];

foreach ($data as $longText) {
    $result[] = cutString($longText,14);
}

var_dump($result);
