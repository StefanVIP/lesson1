<?php

$line = 'Student, hello!';
$letters = str_split($line);

$result = [];
// Make letters as key of array and make number of same letters as value
foreach ($letters as $value) {
    if (array_key_exists($value, $result)) {
        $result[$value]++;
    } else {
        $result[$value] = 1;
    }
}
print_r($result);

// Вариант 2

// $line = 'Hello';
// $letters = str_split($line);
// print_r(array_count_values($letters));
