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

    public function __construct($dbRow)
    {

        $this->userFullName = $dbRow[0]['surname'] . " " . $dbRow[0]['first_name'] . " " . $dbRow[0]['middle_name'];
        $this->userFirstName = $dbRow[0]['first_name'];
        $this->userMiddleName = $dbRow[0]['middle_name'];
        $this->userLastName = $dbRow[0]['surname'];
        $this->userEmail = $dbRow[0]['email'];
        $this->userPhoneNumber = $dbRow[0]['phone_number'];

        foreach ($dbRow as $group) {
            $this->userGroup[] = $group['name'];
        }

        foreach ($dbRow as $desc) {
            $this->userGroupDescription[] = $desc['discription'];
        }

        foreach ($dbRow as $id) {
            $this->userGroupId[] = $id['group_id'];
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

}
