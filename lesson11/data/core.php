<?php

$empty = false;
$success = false;
$error = false;

function authorization($login, $password, $logins, $passwords)
{
    return $passwords[$logins[array_search($login, array_column($logins, 'login'))]['passwordId']] === $password;
}

if (!empty ($_POST)) {
    if (empty ($_POST['login']) || empty ($_POST['password'])) {
        $empty = true;
    } else {
        if (authorization($_POST['login'], $_POST['password'], $logins, $passwords)) {
            $success = true;
        } else {
            $error = true;
        }
    }
}