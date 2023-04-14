<?php
// Одномерные Массивы

// 1. Заполните массив $numbers с тремя значениями - любыми целыми числами
$numbers = [345, 12, 7];


// 2. Заполните массив $lines с тремя значениями - любыми словами
$lines = ["Bubble", "Stick", "Shoe"];


// 3. Заполните массив $one c одним значением равным 8, ключом этого значения сделайте число 34
$one = [34 => 8];


// 4. Даны следующие слова и описание к ним: мышь - это животное грызун, конь - скачет по полям, хрюшка - кушает желуди
// Создайте массив словарь $dictionary, содержащий три элемента. ключом элементам массива сделайте - имя животного, а значением - его описание
$dictionary = [
    "Мышь" => "это животное грызун",
    "Конь" => "скачет по полям",
    "Хрюшка" => "кушает желуди"
];


// 5. Теперь, не очень хорошо, когда ключи массива содержат символы, не относящиеся к английскому языку
// переименуйте ключи в массиве $dictionary, укажите вместо них английские названия животных
$dictionary = [
    "Mouse" => "это животное грызун",
    "Horse" => "скачет по полям",
    "Pig" => "кушает желуди"
];


// 6. Выведите массив $dictionary, известной вам функцией
var_dump($dictionary);

// 7. А теперь выведите отдельно описание мышки из массива $dictionary
var_dump($dictionary["Mouse"]);

// 8. А выведите описание хрюшки из массива $dictionary
var_dump($dictionary["Pig"]);

// 9. А выведите третий элемент из массива $numbers
var_dump($numbers[2]);

// 10. Мне не нравится это число, поместите в третий элемент массива $numbers число 3.14
// И выведите его, чтобы убедиться, что там теперь действительно это новое число
$numbers[2] = 3.14;
var_dump($numbers[2]);

// 11. Создайте массив $days, состоящий из дней недели, сделайте ключи этого массива равными номеру дня в неделе от 1 до 7,
// а значениями сделайте строку с названием дня, 1 - Понедельник, 2 - Вторник и т.д.
$days = [
    1 => "Понедельник",
    2 => "Вторник",
    3 => "Среда",
    4 => "Четверг",
    5 => "Пятница",
    6 => "Суббота",
    7 => "Воскресенье",
];