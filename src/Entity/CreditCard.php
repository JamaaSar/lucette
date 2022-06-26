<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CreditCardRepository")
 */
class CreditCard
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeUsers", inversedBy="creditCards")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerId;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $monthValidity;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $yearValidity;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $lastDigits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cardToken;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cardType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerId(): ?MooveeUsers
    {
        return $this->customerId;
    }

    public function setCustomerId(?MooveeUsers $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getMonthValidity(): ?string
    {
        return $this->monthValidity;
    }

    public function setMonthValidity(string $monthValidity): self
    {
        $this->monthValidity = $monthValidity;

        return $this;
    }

    public function getYearValidity(): ?string
    {
        return $this->yearValidity;
    }

    public function setYearValidity(string $yearValidity): self
    {
        $this->yearValidity = $yearValidity;

        return $this;
    }

    public function getLastDigits(): ?string
    {
        return $this->lastDigits;
    }

    public function setLastDigits(string $lastDigits): self
    {
        $this->lastDigits = $lastDigits;

        return $this;
    }

    public function getCardToken(): ?string
    {
        return $this->cardToken;
    }

    public function setCardToken(string $cardToken): self
    {
        $this->cardToken = $cardToken;

        return $this;
    }

    public function getCardType(): ?string
    {
        return $this->cardType;
    }

    public function setCardType(string $cardType): self
    {
        $this->cardType = $cardType;

        return $this;
    }
}
