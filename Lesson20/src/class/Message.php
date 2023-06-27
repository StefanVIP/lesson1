<?php

class Message
{
    private int $id;
    private string $text;
    private string $title;
    private User $sender;
    private User $recipient;
    private DateTime $dateTime;

    public function __construct(int $id, string $text, string $title, User $sender, User $recipient, DateTime $dateTime)
    {
        $this->id = $id;
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
        $intlFormatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::MEDIUM, IntlDateFormatter::MEDIUM);
        $intlFormatter->setPattern('dd MMMM HH:mm');
        return $intlFormatter->format($this->dateTime);
    }

    public function getSender(): string
    {
        return $this->sender->getUserFirstName() . " " . $this->sender->getUserMiddleName() . " " . mb_substr($this->sender->getUserLastName(), 0, 1) . ".";
    }

    public function getRecipient(): string
    {
        return $this->recipient->getUserFirstName() . " " . $this->recipient->getUserMiddleName() . " " . mb_substr($this->recipient->getUserLastName(), 0, 1) . ".";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
