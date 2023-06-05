<?php

$empty = false;
$cookieLogin = '';

function authorization(string $login, string $password): bool
{
    global $logins, $passwords;
    $prepared = array_flip(array_column($logins, 'login'));
    return isset($logins) && $passwords[$prepared[$login]] === $password;
}

function sessionAuthorization(string $login): bool
{
    if (authorization($_POST['login'], $_POST['password'])) {
        $_SESSION['isAuth'] = true;
        $_SESSION['login'] = $login;
        setcookie('login', $login, time() + 60 * 60 * 24 * 30, '/');
        return true;
    } else {
        $_SESSION['isAuth'] = false;
        return false;
    }
}

if (!empty ($_POST)) {
    $empty = empty($_POST['login']) || empty($_POST['password']);

    if (!$empty) {
        $authorized = sessionAuthorization($_POST['login']);
    }
}

function isAuthorized()
{
    if (isset($_SESSION['isAuth'])) {
        return $_SESSION['isAuth'];
    } else {
        return false;
    }
}

//If the user is logged in, update the "login" cookie expiration time
if (isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60 * 60 * 24 * 30, '/');
    $cookieLogin = $_COOKIE['login'];
}

function logout()
{
    session_unset();
    session_destroy();
    $_SESSION = [];
}

// Processing logout link
if (isset($_GET['logout'])) {
    logout();
}
