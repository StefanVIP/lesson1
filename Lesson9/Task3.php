<?php

$numbers = [];
// Create array with random values
$rand = rand(3, 20);

for ($i = 0; $i < $rand; $i++) {
    $numbers[$i] = rand(0, 10);
}

$sum = 0;
// Find odd keys and sum their values
foreach ($numbers as $key => $value) {
    if ($key % 2 !== 0) {
        $sum += $value;
    }
}

print_r($numbers);
echo "Сумма значений массива, стоящих под нечётным индексом, равна $sum";
