<?php

class UserProfile
{
    private array $userProfile = [];
    private $userName;
    private $userSurname;
    private $userMiddleName;
    private $userEmail;
    private $userPhoneNumber;
    private $userGroup;
    private $userGroupDescription;

    private function createUserProfile(): array
    {
        $conn = DbConnect::getInstance()->getConnection();

        $stmt = $conn->prepare(<<<SQL
SELECT users.email, users.first_name, users.middle_name, users.surname, users.phone_number, u_groups.name, u_groups.discription 
FROM users 
    LEFT JOIN group_user ON users.id = group_user.user_id 
    LEFT JOIN u_groups ON group_user.group_id = u_groups.id 
WHERE users.id = :id;
SQL
        );
        $stmt->execute(['id' => isset($_SESSION['user']) ?? '']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __construct()
    {
        $this->userProfile = $this->createUserProfile();
        if (!empty($this->userProfile)) {
            $this->userName = $this->userProfile[0]['first_name'];
            $this->userSurname = $this->userProfile[0]['surname'];
            $this->userMiddleName = $this->userProfile[0]['middle_name'];
            $this->userEmail = $this->userProfile[0]['email'];
            $this->userPhoneNumber = $this->userProfile[0]['phone_number'];

            foreach ($this->userProfile as $group) {
                $this->userGroup[] = $group['name'];
            }

            foreach ($this->userProfile as $desc) {
                $this->userGroupDescription[] = $desc['discription'];
            }
        }
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getUserSurname()
    {
        return $this->userSurname;
    }

    /**
     * @return mixed
     */
    public function getUserMiddleName()
    {
        return $this->userMiddleName;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPhoneNumber()
    {
        return $this->userPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * @return mixed
     */
    public function getUserGroupDescription()
    {
        return $this->userGroupDescription;
    }

}
