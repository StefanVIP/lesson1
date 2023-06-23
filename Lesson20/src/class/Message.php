<?php

class Message
{
    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            $messagesData = new MessageStorage();
            $this->senderMessagesData = $messagesData->getMessagesBySender();
            $this->recepientMessagesData = $messagesData->getMessagesByRecipient();
        }

    }

    /**
     * @return array
     */
    public function getSenderMessages(): array
    {
        return $this->senderMessagesData;
    }

    public function getRecepientMessages(): array
    {
        return $this->recepientMessagesData;
    }

}
