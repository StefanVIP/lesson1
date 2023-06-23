<?php
class UserStorage
{
    private function createUserData($dbRow): array
    {
        $conn = DbConnect::getInstance()->getConnection();
        $stmt = $conn->prepare(<<<SQL
SELECT users.email, users.first_name, users.middle_name, users.surname, users.phone_number, u_groups.name, u_groups.discription, group_user.group_id 
FROM users 
    LEFT JOIN group_user ON users.id = group_user.user_id 
    LEFT JOIN u_groups ON group_user.group_id = u_groups.id 
WHERE users.id = :id;
SQL
        );
        $stmt->execute(['id' => $dbRow]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function __construct($dbRow) {
        $this->userById = $this->createUserData($dbRow);
    }
    public function getUserById(): array
    {
        return $this->userById;
    }
}
