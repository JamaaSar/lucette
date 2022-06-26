<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlannedCleaningOptionsRepository")
 */
class PlannedCleaningOptions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PlannedCleaning", inversedBy="plannedCleaningOptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planned_cleaning_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Option", inversedBy="plannedCleaningOptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $option_id;

    /**
     * @ORM\Column(type="float")
     */
    private $price_paid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlannedCleaningId(): ?PlannedCleaning
    {
        return $this->planned_cleaning_id;
    }

    public function setPlannedCleaningId(?PlannedCleaning $planned_cleaning_id): self
    {
        $this->planned_cleaning_id = $planned_cleaning_id;

        return $this;
    }

    public function getOptionId(): ?Option
    {
        return $this->option_id;
    }

    public function setOptionId(?Option $option_id): self
    {
        $this->option_id = $option_id;

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
}
