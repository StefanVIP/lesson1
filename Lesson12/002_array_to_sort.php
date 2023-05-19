<?php

require __DIR__ . '/002_arraysort.php';
$menu = [
    [
        'name' => 'Главная страница',
        'sort' => 1,
        'path' => '/',
    ],
    [
        'name' => 'О нас',
        'sort' => 110,
        'path' => '/about',
    ],
    [
        'name' => 'О QSOFT',
        'sort' => 10,
        'path' => '/qsoft',
    ],
    [
        'name' => 'О Skillbox',
        'sort' => 9,
        'path' => '/skillbox',
    ],
    [
        'name' => 'О погоде',
        'sort' => 9200,
        'path' => '/weather',
    ],
];


var_dump(arraySort($menu, 'sort', SORT_ASC));
/**
 * Должен получиться следующий порядок:
 * - Главная страница
 * - О Skillbox
 * - О QSOFT
 * - О нас
 * - О погоде
 */