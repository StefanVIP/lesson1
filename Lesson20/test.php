<?php

class Message
{
    private string $text;
    private string $title;
    private User $sender;
    private User $recipient;
    private DateTime $dateTime;

    public function __construct(string $text, string $title, User $sender, User $recipient, DateTime $dateTime)
    {
        $this->text = $text;
        $this->title = $title;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->dateTime = $dateTime;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDateTime(): string
    {
        return $this->dateTime->format('Y-m-d H:i:s');
    }

    public function getSenderFullName(): string
    {
        return $this->sender->getFullName();
    }

    public function getRecipient(): string
    {
        return $this->recipient->getFullName();
    }
}

class MessageStorage
{
    private $db;
    private UserStorage $userStorage;

    public function __construct(PDO $db, UserStorage $userStorage)
    {
        $this->db = $db;
        $this->userStorage = $userStorage;
    }

    public function getMessagesListByRecipientId(int $id): array
    {
        $dbrows = $this->db->prepare();
        $result = [];
        foreach ($dbrows as $dbrow) {
            $result[] = $this->getMessageFromDbRow($dbrow);
        }
        return $result;
    }

    public function getMessageById(int $id): Message
    {
        $dbrow = $this->db->prepare();

        return $this->getMessageFromDbRow($dbrow);
    }

    private function getMessageFromDbRow(array $dbrow): Message
    {
        $recipient = $this->userStorage->getUserById($dbrow['recipient_id']);
        $sender = $this->userStorage->getUserById($dbrow['sender_id']);
        $dateTime = new DateTime($dbrow['date_time']);
        return new Message($dbrow['text'], $dbrow['title'], $sender, $recipient, $dateTime);
    }

}
