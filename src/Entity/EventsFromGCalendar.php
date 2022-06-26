<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventsFromGCalendarRepository")
 */
class EventsFromGCalendar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    /**
     * @ORM\Column(type="string")
     */
    private $eventId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $googleCalendarId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getEventId(): ?string
    {
        return $this->eventId;
    }

    public function setEventId(?string $eventId): self
    {
        $this->eventId = $eventId;

        return $this;
    }

    public function getGoogleCalendarId(): ?string
    {
        return $this->googleCalendarId;
    }

    public function setGoogleCalendarId(string $googleCalendarId): self
    {
        $this->googleCalendarId = $googleCalendarId;

        return $this;
    }

    public function getEventName(): ?string
    {
        return $this->eventName;
    }

    public function setEventName(string $eventName): self
    {
        $this->eventName = $eventName;

        return $this;
    }
}
