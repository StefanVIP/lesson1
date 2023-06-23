<?php

class UserProfile
{
//    private array $userProfile = [];
//    private function createUserProfile(): array
//    {
//        $conn = DbConnect::getInstance()->getConnection();
//
//        $stmt = $conn->prepare(<<<SQL
//SELECT users.email, users.first_name, users.middle_name, users.surname, users.phone_number, u_groups.name, u_groups.discription, group_user.group_id
//FROM users
//    LEFT JOIN group_user ON users.id = group_user.user_id
//    LEFT JOIN u_groups ON group_user.group_id = u_groups.id
//WHERE users.id = :id;
//SQL
//        );
//        $stmt->execute(['id' => isset($_SESSION['user']) ?? '']);
//
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $user = new UserStorage($_SESSION['user']);
            $this->userProfile = $user->getUserById();
            }

        if (!empty($this->userProfile)) {
            $this->userFullName = $this->userProfile[0]['surname'] . " " . $this->userProfile[0]['first_name'] . " " . $this->userProfile[0]['middle_name'];
            $this->userEmail = $this->userProfile[0]['email'];
            $this->userPhoneNumber = $this->userProfile[0]['phone_number'];

            foreach ($this->userProfile as $group) {
                $this->userGroup[] = $group['name'];
            }

            foreach ($this->userProfile as $desc) {
                $this->userGroupDescription[] = $desc['discription'];
            }

            foreach ($this->userProfile as $id) {
                $this->userGroupId[] = $id['group_id'];
            }

        }
    }

    /**
     * @return string
     */
    public function getUserFullName(): string
    {
        return $this->userFullName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPhoneNumber(): int
    {
        return $this->userPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getUserGroup(): array
    {
        return $this->userGroup;
    }

    /**
     * @return mixed
     */
    public function getUserGroupDescription(): array
    {
        return $this->userGroupDescription;
    }

    /**
     * @return mixed
     */
    public function getUserGroupId(): array
    {
        return $this->userGroupId;
    }

}
