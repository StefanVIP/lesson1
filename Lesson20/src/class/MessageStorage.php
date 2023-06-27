<?php

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
        $stmt = $this->db->prepare(<<<SQL
SELECT id, title, text, creation_time, receiver_id, sender_id
FROM messages
WHERE receiver_id = :id;
SQL
        );
        $stmt->execute(['id' => $id]);
        $dbRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dbRows as $dbRow) {
            $result[] = $this->getMessageFromDbRow($dbRow);
        }
        return $result;
    }

    public function getMessagesListBySenderId(int $id): array
    {
        $stmt = $this->db->prepare(<<<SQL
SELECT id, title, text, creation_time, receiver_id, sender_id
FROM messages
WHERE sender_id = :id;
SQL
        );
        $stmt->execute(['id' => $id]);
        $dbRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($dbRows as $dbRow) {
            $result[] = $this->getMessageFromDbRow($dbRow);
        }
        return $result;
    }

    public function getMessageById(int $id): Message
    {
        $stmt = $this->db->prepare(<<<SQL
SELECT id, title, text, creation_time, receiver_id, sender_id
FROM messages
WHERE id = :id;
SQL
        );
        $stmt->execute(['id' => $id]);
        $dbRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->getMessageFromDbRow($dbRow[0]);
    }

    private function getMessageFromDbRow(array $dbRow): Message
    {
        $recipient = $this->userStorage->getUserById($dbRow['receiver_id']);
        $sender = $this->userStorage->getUserById($dbRow['sender_id']);
        $dateTime = new DateTime($dbRow['creation_time']);
        return new Message($dbRow['id'], $dbRow['text'], $dbRow['title'], $sender, $recipient, $dateTime);
    }

    public function addNewMessage(string $title, string $text, int $sender, int $recipient): void
    {
        $stmt = $this->db->prepare(<<<SQL
INSERT INTO messages (title, text, sender_id, receiver_id)
VALUES (:title, :text, :sender_id, :receiver_id)
SQL
        );
        $stmt->execute(['title' => $title, 'text' => $text, 'sender_id' => $sender, 'receiver_id' => $recipient]);
    }
}
