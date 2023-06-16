<?php

class ConnectDb
{
    private static $instance = null;
    private $conn;

    protected function __construct()
    {
        $data = require_once __DIR__ . '/settings.php';

        try {
            $this->conn = new PDO('mysql:host=' . $data['host'] . ';dbname=' . $data['dbname'], $data['user'], $data['password']);
            $this->conn->exec('SET NAMES UTF8');
        } catch (PDOException $e) {
            echo 'Ошибка подключения к БД: ' . $e->getMessage();
        }
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new ConnectDb();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

//$instance = ConnectDb::getInstance();
//$conn = $instance->getConnection();
//
//$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
//$stmt->execute(['email' => $_POST['login']]);
//if (!$stmt->rowCount()) {
//    print_r('Пользователь с такими данными не зарегистрирован');
//    die;
//}
//$user = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($user);
