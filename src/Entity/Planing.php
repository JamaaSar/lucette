<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaningRepository")
 */
class Planing
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeUsers", inversedBy="planings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PlannedCleaning", inversedBy="planings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PlannedCleaning;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?MooveeUsers
    {
        return $this->user;
    }

    public function setUser(?MooveeUsers $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPlannedCleaning(): ?PlannedCleaning
    {
        return $this->PlannedCleaning;
    }

    public function setPlannedCleaning(?PlannedCleaning $PlannedCleaning): self
    {
        $this->PlannedCleaning = $PlannedCleaning;

        return $this;
    }
}
