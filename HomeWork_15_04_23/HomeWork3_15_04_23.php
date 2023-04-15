<?php

// Создайте многомерный ассоциативный массив $result1 с двумя ключами — 'author' и 'book':
// 1. в индекс (ключ) 'author' добавьте ассоциативный массив данных об авторе: ФИО, email;
// 2. в индекс (ключ) 'book' добавьте ассоциативный массив данных о книге: название и email автора.

$result1 = [
    'authors' => [
        ['authorName' => 'Писателев Петр Андреевич', 'email' => 'pisatelev@mail.ru'],
        ['authorName' => 'Творцов Артем Игоривич', 'email' => 'tvortsov@mail.ru'],
        ['authorName' => 'Написаев Олег Евгениевич', 'email' => 'napisaev@mail.ru'],
        ['authorName' => 'Перепесун Игорь Иванович', 'email' => 'perepesun@mail.ru']
    ],
    'books' => [
        ['bookName' => 'Что делать?', 'email' => 'pisatelev@mail.ru'],
        ['bookName' => 'Виды дрелей или как испортить жизнь соседям', 'email' => 'tvortsov@mail.ru'],
        ['bookName' => '10 способов поднять самооценку', 'email' => 'napisaev@mail.ru'],
        ['bookName' => 'Кто виноват?', 'email' => 'perepesun@mail.ru']
    ]
];

// Используя данные из созданного массива, сформируйте и выведите строку, подставив данные вместо блоков,
// обрамлённых решётками: #Фио автора# написал книгу, которая называется #Название книги#.

var_dump($result1["authors"][0]["authorName"] . ' написал книгу, которая называется "' . $result1["books"][0]["bookName"] . '"');

// Используя данные из созданного массива, сформируйте и выведите строку, подставив данные вместо блоков,
// обрамлённых решётками: Автор #Фио автора# ждёт ваших отзывов, напишите ему на электронную почту #Email автора#.

var_dump('Автор ' . $result1["authors"][1]["authorName"] . ' ждёт ваших отзывов, напишите ему на электронную почту ' . $result1["books"][1]["email"]);