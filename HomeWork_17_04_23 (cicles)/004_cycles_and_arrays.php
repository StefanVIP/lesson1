<?php

// Циклы для данных в массивах

// 1. Создайте массив скучных игрушек - $boringToys. Создайте в нем случайное количество элементов от 1 до 10, где каждый элемент этого массива это ассоциативный массив с двумя полями:
// - Название игрушки: в виде "Игрушка 1"
// - Цена игрушки: случайное число от 100 до 1000

$boringToys = [];
$random = rand(1, 11);
for ($i = 1; $i < $random; $i++) {
    $boringToys[] = [
        "toysName" => "Игрушка " . $i,
        "toysPrice" => rand(100, 1000)
    ];
}

print_r($boringToys);

// Дан массив $cars. Состоящий из трех машин со следующими данными: Мерседес - 10000 руб, BMW - 9999 руб, Автобус - 20000 руб.
$cars = [
    [
        'name' => 'Мерседес',
        'price' => 10000,
        'colors' => []
    ],
    [
        'name' => 'BMW',
        'price' => 9999,
        'colors' => [],
    ],
    [
        'name' => 'Автобус',
        'price' => 20000,
        'colors' => []
    ],
];

// 2. Посчитайте и выведите стоимость всех машин
$allCarsSum = 0;
foreach ($cars as $arr) {
    $allCarsSum += $arr['price'];
}
echo $allCarsSum;

// Ещё один вариант
//  $allCarsSum = array_sum(array_column($cars, 'price'));
//  echo $allCarsSum;

// 3. Для каждой машины заполните поле colors. В этом поле должны хранится все возможные варианты цветов для этой машины, при чем для каждого этого цвета, есть своя надбавка к стоимости (разная для разных машин)
// Создайте массив colors с цветами доступными для каждой машины. И случайным образом выберите из этого массива по 3 цвета для каждой машины. Эти цвета добавьте в массив $cars в поле colors. Для каждого цвета также укажите случайную надбавку к цене - случайное число от 0 до 100
// Выведите итоговый массив $cars c помощью функции var_dump и убедитесь в его правильности.
$colors = ['Черный', 'Белый', 'Золотой', 'Зеленый', 'Красный', 'Синий', 'Оранжевый', 'Баклажановый', 'Четкий'];

foreach ($cars as $key => $val) {
    for ($i = 0; $i < 3; $i++) {
        $cars[$key]['colors'][] = [
            "carColor" => $colors[rand(0, 8)],
            "colorPrice" => rand(0, 100)
        ];
    }
}

print_r($cars);

// Вариант 2

//$i = 0;
//foreach ($cars as $val) {
//    while (count($cars[$i]['colors']) < 3) {
//        $cars[$i]['colors'][] = [
//            "carColor" => $colors[rand(0, 8)],
//            "colorPrice" => rand(0, 100)
//        ];
//    }
//    $i++;
//}
//
//print_r($cars);

// Вариант 3

//for ($i = 0; $i < 9; $i++) {
//    if ($i < 3) {
//        $cars[0]['colors'][] = [
//            "carColor" => $colors[rand(0, 8)],
//            "colorPrice" => rand(0, 100)
//        ];
//    } elseif ($i >= 3 && $i < 6) {
//        $cars[1]['colors'][] = [
//            "carColor" => $colors[rand(0, 8)],
//            "colorPrice" => rand(0, 100)
//        ];
//    } else {
//        $cars[2]['colors'][] = [
//            "carColor" => $colors[rand(0, 8)],
//            "colorPrice" => rand(0, 100)
//        ];
//    }
//}
//print_r($cars);


// 4. Каталог автомобилей.
// А теперь выведите весь каталог автомобилей в виде:
// "Купите автомобиль {} цвета {} всего за: {} руб"
// вместо {} поставьте соответственно: название автомобиля, цвет, стоимость в этом цвете.

foreach ($cars as $key => $val) {
    foreach ($val as $key1 => $val1) {
        foreach ($val1 as $key2 => $val2) {
            $allPrice = $val['price'] + $val2['colorPrice'];
            echo "Купите автомобиль " . $val['name'] . " цвета " . $val2['carColor'] . " всего за: " . $allPrice . " руб";
            echo "\n";
        }
    }
}