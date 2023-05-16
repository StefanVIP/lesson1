<?php

declare(strict_types=1);

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
