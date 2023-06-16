<?php

class UserProfile
{
    public function getUserProfile(): array
    {
        $instance = DbConnect::getInstance();
        $conn = $instance->getConnection();



        $stmt = $conn->prepare(
<<<SQL
SELECT u.email, u.first_name, u.middle_name, u.surname, u.phone_number, u_groups.name, u_groups.discription 
FROM users u
    LEFT JOIN group_user ON u.id = group_user.user_id 
    LEFT JOIN u_groups ON group_user.group_id = u_groups.id 
WHERE u.id = :id
SQL
);

        $stmt->execute(['id' => $_SESSION['user']]);
        if (!$stmt->rowCount()) {
            die;
        } else {

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

$userProfile = new UserProfile();
if ($userAuth->isAuthorized()) {
    $profile = [$userProfile->getUserProfile()];
}
