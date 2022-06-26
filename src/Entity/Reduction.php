<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReductionRepository")
 */
class Reduction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reduction;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $utilise;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction(?float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getUtilise(): ?int
    {
        return $this->utilise;
    }

    public function setUtilise(?int $utilise): self
    {
        $this->utilise = $utilise;

        return $this;
    }
}
