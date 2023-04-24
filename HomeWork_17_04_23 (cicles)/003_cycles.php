<?php

// 1. Выведите числа от 0 до 9

for ($a = 0; $a < 10; $a++)
    echo "$a ";

// 2. Выведите 10 случайных чисел от 1 до 10

for ($i = 1; $i < 10; $i++) {
    $arr = [rand(1, 10)];
    var_dump($arr);
}

// 3. Создайте массив $items из 10 случайных целых значений от 0 до 9

for ($b = 0; $b < 10; $b++) {
    $items[$b] = [rand(0, 9)];
}
var_dump($items);

// 4. Добавляйте случайные целые числа от 1 до 9 в массив $numbers до тех пор, пока сумма всех элементов этого массива меньше 100
// А затем выведите сколько числе всего в массиве: "Длинна массива numbers = {}"

// Вариант 1

$numbers = array();
while (array_sum($numbers) < 100) {
    $numbers[] = rand(1, 9);
}
echo "Длинна массива numbers = " . count($numbers);
echo "\n";

// Вариант 2

$numberSum = 0;
while ($numberSum < 100) {
    $numbers[] = rand(1, 9);
    foreach ($numbers as $arr) {
        $numberSum += $arr;
    }
}
echo "Длинна массива numbers = " . count($numbers);
echo "\n";

// 5. Переберите массив $numbers, созданный ранее, и посчитайте сумму всех четных чисел в нем
// Выведите следующие строки (как всегда вместо {} подставив нужные значения):
// Общая сумма массива numbers = {}
// Из нее часть, которая приходится на четные числа = {}
// И часть из нечетных чисел = {}

$numberSum = 0;
while ($numberSum < 100) {
    $numbers[] = rand(1, 9);
    foreach ($numbers as $arr) {
        $numberSum += $arr;
    }
}
echo "Общая сумма массива numbers = " . array_sum($numbers);
echo "\n";

foreach ($numbers as $value) {
    if (($value + 1) % 2 == 0) {
        $even[] = $value;
    } else {
        $uneven[] = $value;
    }
}
echo "Из нее часть, которая приходится на четные числа = " . array_sum($even);
echo "\n";

echo "И часть из нечетных чисел = " . array_sum($uneven);
echo "\n";