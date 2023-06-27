<?php

class User
{
    private string $firstName;
    private string $lastName;
    private string $middleName;
    private string $email;
    private int $phoneNumber;
    private array $groups;
    private int $id;

    public function __construct($dbRow)
    {
        $this->firstName = $dbRow['first_name'];
        $this->middleName = $dbRow['middle_name'];
        $this->lastName = $dbRow['surname'];
        $this->email = $dbRow['email'];
        $this->phoneNumber = $dbRow['phone_number'];
        $this->id = $dbRow['id'];
        $this->groups = json_decode($dbRow['group_data'], true);
    }

    /**
     * @return string
     */
    public function getUserFullName(): string
    {
        return $this->lastName . " " . $this->firstName . " " . $this->middleName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): int
    {
        return $this->phoneNumber;
    }

    /**
     * @return array
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
