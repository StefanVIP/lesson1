<?php
// Create array with random values
$values = [];
for ($i = 0; $i < 10; $i++) {
    $values[] = rand(0, 100);
}

$index = 0;
$min = $values[0];
// Find the minimum value and it's key
foreach ($values as $i => $item) {
    if ($item < $min) {
        $min = $item;
        $index = $i;
    }
}

print_r($values);
echo "Минимальное значение " . $min . " находится на позиции " . $index;

// Вариант 2

//$values = [];
//for ($i=0; $i < 10; $i++) {
//    $values[] = rand(0, 100);
//}
//print_r($values);
//echo "Минимальное значение " . min($values) . " находится на позиции " . array_search(min($values), $values);
