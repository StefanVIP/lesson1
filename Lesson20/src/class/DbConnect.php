<?php

final class DbConnect
{
    private static ?DbConnect $instance = null;
    private PDO $conn;

    private function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup(): string
    {
        throw new Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DbConnect();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function configure(array $data): void
    {
        $this->conn = new PDO(
            sprintf("mysql:host=%s;dbname=%s", $data['host'], $data['dbname']),
            $data['user'],
            $data['password']
        );
    }

}

// Temporary for testing
//$dbConfiguration = require_once __DIR__ . '/../settings.php';
//
//$connect = DbConnect::getInstance();
//$connect->configure($dbConfiguration);
//$connect = $connect->getConnection();
//$stmt = $connect->prepare(<<<SQL
//SELECT *,
//       (SELECT JSON_ARRAYAGG(name)
//        FROM (SELECT name
//              FROM u_groups ug
//              WHERE id IN
//                    (SELECT gu.group_id
//                     FROM group_user gu
//                     WHERE gu.user_id = :userId))
//                 as names)
//           as group_data
//FROM users
//where id = :userId;
//SQL
//);
//$stmt->execute(['userId' => 1]);
//var_dump($stmt->fetch(PDO::FETCH_ASSOC));
