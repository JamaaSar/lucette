<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GoogleCalendarApiRepository")
 */
class GoogleCalendarApi
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
    private $iduser;

    /**
     * @ORM\Column(type="array")
     */
    private $token;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $calendarId;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(?int $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getToken(): ?array
    {
        return $this->token;
    }

    public function setToken(array $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getCalendarId(): ?string
    {
        return $this->calendarId;
    }

    public function setCalendarId(string $calendarId): self
    {
        $this->calendarId = $calendarId;

        return $this;
    }


}
