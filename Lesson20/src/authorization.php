<?php

$cookieId = '';
$empty = false;
$authorized = false;

class AuthorizationClass
{
    private $user = [];

    public function authorization(string $login, string $password): bool
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $login]);
        if (!$stmt->rowCount()) {
            //  print_r('Пользователь с такими данными не зарегистрирован');
            die;
        } else {

            $this->user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($password, $this->user['password'])) {
                $_SESSION['isAuth'] = true;
                $_SESSION['user'] = $this->user['id'];
                setcookie('login', $this->user['email'], time() + 60 * 60 * 24 * 30, '/');
                return true;
            } else {
                $_SESSION['isAuth'] = false;
                return false;
            }
        }
    }

    public function isAuthorized(): bool
    {
        if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] === true) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $_SESSION = [];
    }
}

$userAuth = new AuthorizationClass();

if (!empty ($_POST)) {
    $empty = empty($_POST['login']) || empty($_POST['password']);

    if (!$empty) {
        $authorized = $userAuth->authorization($_POST['login'], $_POST['password']);
    }
}

//If the user is logged in, update the "login" cookie expiration time
if (isset($_COOKIE['login'])) {
    setcookie('login', $_COOKIE['login'], time() + 60 * 60 * 24 * 30, '/');
    $cookieId = $_COOKIE['login'];
}

// Processing logout link
if (isset($_GET['logout'])) {
    $userAuth->logout();
}
