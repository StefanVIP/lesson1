<?php

// Создайте два числа $number1 и $number2, поместив в них случайное число от 0 до 9 (используйте функцию rand(0, 10)).

$number1 = rand(0,10);
$number2 = rand(0,10);

// Выведите сумму, разность, произведение и частное этих двух чисел.

var_dump($number1 + $number2);
var_dump($number1 - $number2);
var_dump($number1 * $number2);
var_dump($number1 / $number2);

// Выведите результат сравнения этих чисел: больше, меньше, равно (boolean).

var_dump($number1 > $number2);
var_dump($number1 < $number2);
var_dump($number1 == $number2);

// Выведите результат инкремента $number1.

var_dump($number1++);

// Выведите результат прекремента $number2.

var_dump(++$number2);

