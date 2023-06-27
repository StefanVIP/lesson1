<?php

class UserStorage
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getUserById(int $id): User
    {
        $stmt = $this->db->prepare(<<<SQL
SELECT *,
       (SELECT JSON_ARRAYAGG(JSON_OBJECT('name', names.name, 'discription', discription))
        FROM (SELECT name, discription
              FROM u_groups ug
              WHERE id IN
                    (SELECT gu.group_id
                     FROM group_user gu
                     WHERE gu.user_id = :id))
                 as names)
           as group_data
FROM users
where id = :id;
SQL
        );
        $stmt->execute(['id' => $id]);
        $dbRow = $stmt->fetch(PDO::FETCH_ASSOC);
        return new User($dbRow);
    }

    public function getAllOtherUsers(int $id): array
    {
        $stmt = $this->db->prepare(<<<SQL
SELECT *,
       (SELECT JSON_ARRAYAGG(JSON_OBJECT('name', names.name, 'discription', discription))
        FROM (SELECT name, discription
              FROM u_groups ug
              WHERE id IN
                    (SELECT gu.group_id
                     FROM group_user gu
                     WHERE gu.user_id = :id))
                 as names)
           as group_data
FROM users
where id != :id;
SQL
        );
        $stmt->execute(['id' => $id]);
        $dbRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dbRows as $dbRow) {
            $result[] = new User($dbRow);
        }
        return $result;
    }

}
