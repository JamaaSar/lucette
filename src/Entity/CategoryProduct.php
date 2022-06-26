<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryProductRepository")
 */
class CategoryProduct
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="categoryProducts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_product;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?Products
    {
        return $this->id_product;
    }

    public function setIdProduct(?Products $id_product): self
    {
        $this->id_product = $id_product;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
