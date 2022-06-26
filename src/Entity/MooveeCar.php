<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MooveeCarRepository")
 */
class MooveeCar
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
    private $brand_car;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $model_car;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $is_deleted;


    /**
     * @ORM\Column(type="string", length=200)
     */
    private $category_car;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MooveeUserHasCar", mappedBy="user_has_car_id_car")
     */
    private $mooveeUserHasCars;



    public function __construct()
    {
        $this->mooveeUserHasCars = new ArrayCollection();

    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandCar(): ?string
    {
        return $this->brand_car;
    }

    public function setBrandCar(string $brand_car): self
    {
        $this->brand_car = $brand_car;

        return $this;
    }

    public function getModelCar(): ?string
    {
        return $this->model_car;
    }

    public function setModelCar(string $model_car): self
    {
        $this->model_car = $model_car;

        return $this;
    }

    public function getIsDeleted(): ?int
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(?int $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }


    public function getCategoryCar(): ?string
    {
        return $this->category_car;
    }

    public function setCategoryCar(string $category_car): self
    {
        $this->category_car = $category_car;

        return $this;
    }

    /**
     * @return Collection|MooveeUserHasCar[]
     */
    public function getMooveeUserHasCars(): Collection
    {
        return $this->mooveeUserHasCars;
    }

    public function addMooveeUserHasCar(MooveeUserHasCar $mooveeUserHasCar): self
    {
        if (!$this->mooveeUserHasCars->contains($mooveeUserHasCar)) {
            $this->mooveeUserHasCars[] = $mooveeUserHasCar;
            $mooveeUserHasCar->setUserHasCarIdCar($this);
        }

        return $this;
    }

    public function removeMooveeUserHasCar(MooveeUserHasCar $mooveeUserHasCar): self
    {
        if ($this->mooveeUserHasCars->contains($mooveeUserHasCar)) {
            $this->mooveeUserHasCars->removeElement($mooveeUserHasCar);
            // set the owning side to null (unless already changed)
            if ($mooveeUserHasCar->getUserHasCarIdCar() === $this) {
                $mooveeUserHasCar->setUserHasCarIdCar(null);
            }
        }

        return $this;
    }




}
