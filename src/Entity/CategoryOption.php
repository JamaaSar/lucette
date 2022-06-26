<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryOptionRepository")
 */
class CategoryOption
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=200)
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Option", inversedBy="category_option")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_option;



    private $name;

    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getIdOption(): ?Option
    {
        return $this->id_option;
    }

    public function setIdOption(?Option $id_option): self
    {
        $this->id_option = $id_option;

        return $this;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
