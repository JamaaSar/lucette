<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MooveeUserHasCarRepository")
 */
class MooveeUserHasCar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeUsers", inversedBy="mooveeUserHasCars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_has_car_id_user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeCar", inversedBy="mooveeUserHasCars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_has_car_id_car;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_has_car_nickname_car;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaning", mappedBy="user_car_id")
     */
    private $plannedCleanings;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_deleted;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $space_number;

    public function __construct()
    {
        $this->plannedCleanings = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserHasCarIdUser(): ?MooveeUsers
    {
        return $this->user_has_car_id_user;
    }

    public function setUserHasCarIdUser(?MooveeUsers $user_has_car_id_user): self
    {
        $this->user_has_car_id_user = $user_has_car_id_user;

        return $this;
    }

    public function getUserHasCarIdCar(): ?MooveeCar
    {
        return $this->user_has_car_id_car;
    }

    public function setUserHasCarIdCar(?MooveeCar $user_has_car_id_car): self
    {
        $this->user_has_car_id_car = $user_has_car_id_car;

        return $this;
    }

    public function getUserHasCarNicknameCar(): ?string
    {
        return $this->user_has_car_nickname_car;
    }

    public function setUserHasCarNicknameCar(string $user_has_car_nickname_car): self
    {
        $this->user_has_car_nickname_car = $user_has_car_nickname_car;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }

    public function getUpdatedDate(): ?\DateTimeInterface
    {
        return $this->updated_date;
    }

    public function setUpdatedDate(?\DateTimeInterface $updated_date): self
    {
        $this->updated_date = $updated_date;

        return $this;
    }


    /**
     * @return Collection|PlannedCleaning[]
     */
    public function getPlannedCleanings(): Collection
    {
        return $this->plannedCleanings;
    }

    public function addPlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if (!$this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings[] = $plannedCleaning;
            $plannedCleaning->setUserCarId($this);
        }

        return $this;
    }

    public function removePlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if ($this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings->removeElement($plannedCleaning);
            // set the owning side to null (unless already changed)
            if ($plannedCleaning->getUserCarId() === $this) {
                $plannedCleaning->setUserCarId(null);
            }
        }

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

    public function getSpaceNumber(): ?string
    {
        return $this->space_number;
    }

    public function setSpaceNumber(?string $space_number): self
    {
        $this->space_number = $space_number;

        return $this;
    }
}
