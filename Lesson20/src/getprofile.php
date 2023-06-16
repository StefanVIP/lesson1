<?php

class UserProfile
{
    public function getUserProfile(): array
    {
        $instance = ConnectDb::getInstance();
        $conn = $instance->getConnection();

        $stmt = $conn->prepare("SELECT users.email, users.first_name, users.middle_name, users.surname, users.phone_number, u_groups.name, u_groups.discription FROM users LEFT JOIN group_user ON users.id = group_user.user_id LEFT JOIN u_groups ON group_user.group_id = u_groups.id WHERE users.id = :id");
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
