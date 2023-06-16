<?php

class Authorization
{
    private $user = [];

    public function authorize(string $login, string $password): bool
    {
        $instance = DbConnect::getInstance();
        $conn = $instance->getConnection();

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $login]);
        if (!$stmt->rowCount()) {
            //  print_r('Пользователь с такими данными не зарегистрирован');
            die; ///почему?
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
