<?php
// Функции по работе со строками

// 1. Уберите слеши "/" в начале и в конце строки, если они есть
$url = '/some/path/to/page/';
$url = trim($url, "/");
echo $url;
echo "\n";

// 2. Уберите из строки все запятые и точки, а пробелы замените на тире
$line = 'Good news, everyone.';
$delete = [",", ".", " "];
$replace = ["", "", "-"];
$line = str_replace($delete, $replace, $line);
echo $line;
echo "\n";

// 3. Посчитайте и выведите длину строки переменной $line
echo "Длинна строки равна " . strlen($line);
echo "\n";

// 4. Найдите на какой позиции находится запятая в строке $line и выведите это значение
$line = 'Good news, everyone.';
$position = strpos($line, ",");
echo "Запятая находится на позиции $position";
echo "\n";

// 5. Вырежьте из строки $line подстроку после запятой до предпоследнего символа с конца
$cut = (substr($line, $position, -2));
$resultLine = str_replace($cut, "", "$line");
echo $resultLine;

// Не понял, до предпоследнего символа с конца включительно или нет? Т.Е. до "." или до "e."?
// от этого зависит что ставить -1 ил -2