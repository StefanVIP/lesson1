<?php

$empty = false;
$cookieLogin = '';

function authorization($login, $password)
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

//Если пользователь авторизован обновляем время действия куки "логин"
if (isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60 * 60 * 24 * 31, '/');
    $cookieLogin = $_COOKIE['login'];
}

function logout()
{
    session_destroy();
    $_SESSION = [];
    // setcookie("login", "", time() - 1, '/', 'task.manager');
}

// Обработка ссылки выход
if (isset($_GET['logout'])) {
    logout();
}
