<?php
// Исправьте типовые ошибки

// 1. Использование констант вместо строк
define(TODAY_IS_MONDAY, false);

// 2. Указание констант вместо ключей в ассоциативных массивах 
$data  = [
    FIRST_KEY => 1,
];
echo $data[FIRST_KEY];

// 3. Использование переменных, которые еще не объявлены
$x = rand(1, 4);
if ($x > 2) {
    $a = 0;
}
echo $a;

// 4. Переопределение значений в суперглобальных переменных
if ($x > 2) {
    $_GET['show_info'] = 'y';
}

if ($_GET['show_info'] == 'y') {
    echo 'done';
}

// 5. Попытка обрамить условием большую часть html кода, чем это нужно
if ($x > 2) {?>
<div class="some-div-class">
    <a href="#" class="some-a-class">На главную</a>
</div>
<?php } else {?>
<div class="some-div-class">
    <a href="#" class="some-a-class">О компании</a>
</div>
<?php }

// 6. Вывод тегов оператором echo
if ($x > 2) {
    echo '<p>Hello World</p>';
}

// 7. Ошибки, связанные с применением bool
$value = (bool) rand(0, 1);
if ($value == true) {
    echo '>';
}

// 8. Ошибки, связанные с применением bool
if ($x > 2) {
    $result = true;
} else {
    $result = false;
}

// 9 Занесение в переменную одного типа значения другого типа
$a = true;
if ($x > 2) {
    $a = 0;
} else {
    $a = 'ok';
}
