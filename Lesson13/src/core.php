<?php
// declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/arraysort.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/cutstring.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/headline.php';

$empty = false;
$authorized = false;

function authorization($login, $password)
{
    global $logins, $passwords;
    $prepared = array_flip(array_column($logins, 'login'));
    return isset($logins) && $passwords[$prepared[$login]] === $password;
}

if (!empty ($_POST)) {
    $empty = empty($_POST['login']) || empty($_POST['password']);

    if (!$empty) {
        $authorized = authorization($_POST['login'], $_POST['password'], $logins, $passwords);
    }
}
