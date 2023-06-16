<?php

class Authorization
{
    private $user = [];

    public function authorize(string $login, string $password): bool
    {
        $authorized = false;
        $conn = DbConnect::getInstance()->getConnection();
        $user = $this->getUserByLogin($login, $conn);

        if ($user) {
            $authorized = password_verify($password, $this->user['password']);
        }

        if ($authorized) {
            $this->setCookies();
        }

        $this->setSession($authorized);

        return $authorized;
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

    private function getUserByLogin(string $login, PDO $conn): array
    {
        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $login]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function setSession(bool $authorized): void
    {
        if($authorized) {
            $_SESSION['isAuth'] = true;
            $_SESSION['user'] = $this->user['id'];
        } else {
            $_SESSION['isAuth'] = false;
        }
    }

    private function setCookies()
    {
        setcookie('login', $this->user['email'], time() + 60 * 60 * 24 * 30, '/');
    }
}
