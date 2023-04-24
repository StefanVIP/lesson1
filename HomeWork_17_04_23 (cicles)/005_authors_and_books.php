<?php

$library = [
    'authors' => [
        [
            'name' => 'Джон Маккормик',
            'email' => 'john_makkormik@example.com',
        ],
        [
            'name' => 'Мартин Роберт',
            'email' => 'martin_robert@example.com',
        ],
    ],
    'books' => [
        [
            'title' => 'Чистый код: создание, анализ и рефакторинг',
            'author' => 'martin_robert@example.com',
        ],
        [
            'title' => 'Девять алгоритмов, которые изменили будущее',
            'author' => 'john_makkormik@example.com',
        ],
        [
            'title' => 'Идеальный программист',
            'author' => 'martin_robert@example.com',
        ],
    ],
];

//  Доработаем массив библиотеки с авторами и книгами из предыдущих домашних заданий.
//  Возьмите массив $library, созданный в приложенном файле 005_authors_and_books.php.
//  Сейчас ключами к каждому автору в этом массиве являются числовые индексы.
//  Давайте заменим их, сделав ключом для каждого из авторов его email. Теперь, зная email автора, мы сможем
//  без перебора массива с авторами получить нужного автора книги, последовательно указав несколько индексов.

foreach ($library['authors'] as $key => $val) {
    $emailKey = $val["email"];
    if ($key >= 0) $key = $emailKey;
    $library1[$key] = $val;
}
$library['authors'] = $library1;

//  Добавьте каждому автору новое поле — «Год рождения».

foreach ($library['authors'] as $key => $val) {
    $library['authors'][$key]['birthYear'] = rand(1970, 1990);
}

//  Добавьте каждой книге новое поле — «Дата публикации».

foreach ($library['books'] as $key => $val) {
    $library['books'][$key]['publicationDate'] = rand(1, 28) . "." . rand(1, 12) . "." . rand(2000, 2010);
}

//  Добавьте ещё одного автора в массив авторов и ещё одну книгу, которую написал этот автор, в массив книг.

$library['authors']['robert_patisson@example.com'] = [
    'name' => 'Роберт Патиссон',
    'email' => 'robert_patisson@example.com',
    'birthYear' => "1985"
];

$library['books'][] = [
    'title' => 'Как досчитать от 0 до 10',
    'author' => 'robert_patisson@example.com',
    'publicationDate' => "12.10.2007"
];

//  Выведите информацию по всем книгам в формате:
//  Книга <Название книги>, её написал <ФИО автора> <Год рождения автора> (<email автора>).

foreach ($library['books'] as $key => $val) {
    $emailAuthor = $val['author'];
    echo "Книга \"" . $val['title'] . "\", её написал " . $library['authors'][$emailAuthor]['name'] . " " . $library['authors'][$emailAuthor]['birthYear'] . " года рождения (" . $val['author'] . ").";
    echo "\n";
}