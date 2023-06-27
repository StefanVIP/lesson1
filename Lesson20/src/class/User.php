<?php

class User
{
    private $userFullName;
    private $userFirstName;
    private $userLastName;
    private $userMiddleName;
    private $userEmail;
    private $userPhoneNumber;
    private $userGroup;
    private $userGroupDescription;
    private $userGroupId;
    private $UserId;

    public function __construct($dbRowUser, $dbRowGroup = [])
    {

        $this->userFullName = $dbRowUser['surname'] . " " . $dbRowUser['first_name'] . " " . $dbRowUser['middle_name'];
        $this->userFirstName = $dbRowUser['first_name'];
        $this->userMiddleName = $dbRowUser['middle_name'];
        $this->userLastName = $dbRowUser['surname'];
        $this->userEmail = $dbRowUser['email'];
        $this->userPhoneNumber = $dbRowUser['phone_number'];
        $this->UserId = $dbRowUser['id'];

        if (!empty($dbRowGroup)) {
            foreach ($dbRowGroup as $group) {
                $this->userGroup[] = $group['name'];
            }

            foreach ($dbRowGroup as $desc) {
                $this->userGroupDescription[] = $desc['discription'];
            }

            foreach ($dbRowGroup as $id) {
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
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @return int
     */
    public function getUserPhoneNumber(): int
    {
        return $this->userPhoneNumber;
    }

    /**
     * @return array
     */
    public function getUserGroup(): array
    {
        return $this->userGroup;
    }

    /**
     * @return array
     */
    public function getUserGroupDescription(): array
    {
        return $this->userGroupDescription;
    }

    /**
     * @return array
     */
    public function getUserGroupId(): array
    {
        return $this->userGroupId;
    }

    /**
     * @return string
     */
    public function getUserFirstName(): string
    {
        return $this->userFirstName;
    }

    /**
     * @return string
     */
    public function getUserLastName(): string
    {
        return $this->userLastName;
    }

    /**
     * @return string
     */
    public function getUserMiddleName(): string
    {
        return $this->userMiddleName;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->UserId;
    }

}
