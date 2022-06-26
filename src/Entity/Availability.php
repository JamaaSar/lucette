<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvailabilityRepository")
 */
class Availability
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parkings", inversedBy="availabilities")
     * @ORM\JoinColumn(nullable=true)
     */
    private $parking;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="availabilities")
     * @ORM\JoinColumn(nullable=true)
     */
    private $provider;


    private $from;


    private $to;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_deleted;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $debut;

    /**
     * @ORM\Column(type="string", length=255,  nullable=true)
     */
    private $fin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $affiche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParking(): ?Parkings
    {
        return $this->parking;
    }

    public function setParking(?Parkings $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }

    public function getDebut(): ?string
    {
        return $this->debut;
    }

    public function setDebut(string $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?string
    {
        return $this->fin;
    }

    public function setFin(string $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(?bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    public function getFrom(): ?\DateTimeInterface
    {
        return $this->from;
    }

    public function setFrom(\DateTimeInterface $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function getTo(): ?\DateTimeInterface
    {
        return $this->to;
    }

    public function setTo(\DateTimeInterface $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function getAffiche(): ?bool
    {
        return $this->affiche;
    }

    public function setAffiche(?bool $affiche): self
    {
        $this->affiche = $affiche;

        return $this;
    }
}
