<?php

$studentsCount = rand(1, 1000000);

echo $studentsCount % 10;
echo "\n";
if ($studentsCount % 10 == 0 || ($studentsCount % 10 >= 5 && $studentsCount % 10 <= 9) || ($studentsCount >= 5 && $studentsCount <= 9)) {
    echo "$studentsCount студентов";
} elseif ($studentsCount % 10 >= 2 && $studentsCount % 10 <= 4) {
    echo "$studentsCount студента";
} else {
    echo "$studentsCount студент";
}

?>
