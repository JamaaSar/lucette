<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlannedCleaningRepository")
 */
class PlannedCleaning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeUsers", inversedBy="plannedCleanings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parkings", inversedBy="plannedCleanings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parkingId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeUserHasCar", inversedBy="plannedCleanings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user_car_id;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $am_pm;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transaction_token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="integer")
     */
    private $planned_start;

    /**
     * @ORM\Column(type="integer")
     */
    private $planned_end;

    /**
     * @ORM\Column(type="float")
     */
    private $price_paid;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaningOptions", mappedBy="planned_cleaning_id")
     */
    private $plannedCleaningOptions;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="plannedCleanings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="plannedCleanings")
     */
    private $Provider;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Planing", mappedBy="PlannedCleaning")
     */
    private $planings;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facture;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $valide;
    //null -> if valide
    //1 -> if not

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reduction;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $edited;
    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":true})
     */
    private $captured;
    //null -> if captured
    // 1 -> if not captured

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $supprime;


    private $from;
    private $to;

    public function __construct()
    {
        $this->plannedCleaningOptions = new ArrayCollection();
        $this->planings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCapture(): ?bool
    {
        return $this->captured;
    }

    public function setCapture(?bool $captured): self
    {
        $this->captured = $captured;

        return $this;
    }

    public function getUserid(): ?MooveeUsers
    {
        return $this->userid;
    }

    public function setUserid(?MooveeUsers $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getParkingId(): ?Parkings
    {
        return $this->parkingId;
    }

    public function setParkingId(?Parkings $parkingId): self
    {
        $this->parkingId = $parkingId;

        return $this;
    }

    public function getUserCarId(): ?MooveeUserHasCar
    {
        return $this->user_car_id;
    }

    public function setUserCarId(?MooveeUserHasCar $user_car_id): self
    {
        $this->user_car_id = $user_car_id;

        return $this;
    }

    public function getAmPm(): ?string
    {
        return $this->am_pm;
    }

    public function setAmPm(string $am_pm): self
    {
        $this->am_pm = $am_pm;

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

    public function getTransactionToken(): ?string
    {
        return $this->transaction_token;
    }

    public function setTransactionToken(string $transaction_token): self
    {
        $this->transaction_token = $transaction_token;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPlannedStart(): ?int
    {
        return $this->planned_start;
    }

    public function setPlannedStart(int $planned_start): self
    {
        $this->planned_start = $planned_start;

        return $this;
    }

    public function getPlannedEnd(): ?int
    {
        return $this->planned_end;
    }

    public function setPlannedEnd(int $planned_end): self
    {
        $this->planned_end = $planned_end;

        return $this;
    }

    public function getPricePaid(): ?float
    {
        return $this->price_paid;
    }

    public function setPricePaid(float $price_paid): self
    {
        $this->price_paid = $price_paid;

        return $this;
    }
    public function getSupprime(): ?int
    {
        return $this->supprime;
    }

    public function setSupprime(int $supprime): self
    {
        $this->supprime = $supprime;

        return $this;
    }

    /**
     * @return Collection|PlannedCleaningOptions[]
     */
    public function getPlannedCleaningOptions(): Collection
    {
        return $this->plannedCleaningOptions;
    }

    public function addPlannedCleaningOption(PlannedCleaningOptions $plannedCleaningOption): self
    {
        if (!$this->plannedCleaningOptions->contains($plannedCleaningOption)) {
            $this->plannedCleaningOptions[] = $plannedCleaningOption;
            $plannedCleaningOption->setPlannedCleaningId($this);
        }

        return $this;
    }

    public function removePlannedCleaningOption(PlannedCleaningOptions $plannedCleaningOption): self
    {
        if ($this->plannedCleaningOptions->contains($plannedCleaningOption)) {
            $this->plannedCleaningOptions->removeElement($plannedCleaningOption);
            // set the owning side to null (unless already changed)
            if ($plannedCleaningOption->getPlannedCleaningId() === $this) {
                $plannedCleaningOption->setPlannedCleaningId(null);
            }
        }

        return $this;
    }

    public function getProduit(): ?Products
    {
        return $this->produit;
    }

    public function setProduit(?Products $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->Provider;
    }

    public function setProvider(?Provider $Provider): self
    {
        $this->Provider = $Provider;

        return $this;
    }

    /**
     * @return Collection|Planing[]
     */
    public function getPlanings(): Collection
    {
        return $this->planings;
    }

    public function addPlaning(Planing $planing): self
    {
        if (!$this->planings->contains($planing)) {
            $this->planings[] = $planing;
            $planing->setPlannedCleaning($this);
        }

        return $this;
    }

    public function removePlaning(Planing $planing): self
    {
        if ($this->planings->contains($planing)) {
            $this->planings->removeElement($planing);
            // set the owning side to null (unless already changed)
            if ($planing->getPlannedCleaning() === $this) {
                $planing->setPlannedCleaning(null);
            }
        }

        return $this;
    }

    public function getFacture(): ?string
    {
        return $this->facture;
    }

    public function setFacture(?string $facture): self
    {
        $this->facture = $facture;

        return $this;
    }

    public function getValide(): ?string
    {
        return $this->valide;
    }

    public function setValide(?string $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getReduction(): ?string
    {
        return $this->reduction;
    }

    public function setReduction(?string $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getEdited(): ?int
    {
        return $this->edited;
    }

    public function setEdited(?int $edited): self
    {
        $this->edited = $edited;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
