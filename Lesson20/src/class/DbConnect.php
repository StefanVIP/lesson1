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

    public function __wakeup(): void
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
