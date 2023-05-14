<?php

$empty = false;
$authorized = false;

function authorization($login, $password)
{
    global $logins, $passwords;
    return $passwords[array_flip(array_column($logins, 'login'))[$login]] === $password;
}

if (!empty ($_POST)) {
    $empty = empty($_POST['login']) || empty($_POST['password']);

    if (!$empty) {
        $authorized = authorization($_POST['login'], $_POST['password'], $logins, $passwords);
    }
}