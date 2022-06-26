<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryLocationRepository")
 */
class CategoryLocation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="idcat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parkings", inversedBy="parkingCat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_location;
 

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIdParking(): ?Parkings
    {
        return $this->id_location;
    }

    public function setIdParking(?Parkings $id_location): self
    {
        $this->id_location = $id_location;

        return $this;
    }
    public function getCategory(): ?Categories
    {
        return $this->id_category;
    }

    public function setCategory(?Categories $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }


   
}
