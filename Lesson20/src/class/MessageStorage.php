<?php

class MessageStorage
{
    private function connect(): PDO
    {
        return DbConnect::getInstance()->getConnection();;
    }

    private function createSenderMessagesList(): array
    {
        $stmt = $this->connect()->prepare(<<<SQL
    SELECT messages.title, messages.text, messages.creation_time, users.surname, users.first_name, users.middle_name, users.email
    FROM messages
         LEFT JOIN users ON messages.sender_id = users.id
    WHERE receiver_id = :id;
SQL
        );
        $stmt->execute(['id' => isset($_SESSION['user']) ?? '']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function createRecipientMessageLists(): array
    {
        $stmt = $this->connect()->prepare(<<<SQL
    SELECT messages.title, messages.text, messages.creation_time, users.surname, users.first_name, users.middle_name, users.email
    FROM messages
         LEFT JOIN users ON messages.receiver_id = users.id
    WHERE sender_id = :id;
    SQL
        );
        $stmt->execute(['id' => isset($_SESSION['user']) ?? '']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $this->messagesBySender = $this->createSenderMessagesList();
            $this->messagesByRecipient = $this->createRecipientMessageLists();
        }
    }

    /**
     * @return mixed
     */
    public function getMessagesBySender(): array
    {
        return $this->messagesBySender;
    }

    public function getMessagesByRecipient(): array
    {
        return $this->messagesByRecipient;
    }
}
