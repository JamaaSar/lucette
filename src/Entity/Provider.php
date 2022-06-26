<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tva;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="id_provider")
     */
    private $products;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supprime;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MooveeUsers", mappedBy="Provider")
     */
    private $mooveeUsers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaning", mappedBy="Provider")
     */
    private $plannedCleanings;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Availability", mappedBy="provider")
     */
    private $availabilities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryProvider", mappedBy="id_provider")
     */
    private $providerCat;

 



    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->mooveeUsers = new ArrayCollection();
        $this->plannedCleanings = new ArrayCollection();
        $this->availabilities = new ArrayCollection();
        $this->parkingCat = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTVA(): ?string
    {
        return $this->tva;
    }

    public function setTVA(string $tva): self
    {
        $this->tva = $tva;

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
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setIdProvider($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getIdProvider() === $this) {
                $product->setIdProvider(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MooveeUsers[]
     */
    public function getMooveeUsers(): Collection
    {
        return $this->mooveeUsers;
    }

    public function addMooveeUser(MooveeUsers $mooveeUser): self
    {
        if (!$this->mooveeUsers->contains($mooveeUser)) {
            $this->mooveeUsers[] = $mooveeUser;
            $mooveeUser->setProvider($this);
        }

        return $this;
    }

    public function removeMooveeUser(MooveeUsers $mooveeUser): self
    {
        if ($this->mooveeUsers->contains($mooveeUser)) {
            $this->mooveeUsers->removeElement($mooveeUser);
            // set the owning side to null (unless already changed)
            if ($mooveeUser->getProvider() === $this) {
                $mooveeUser->setProvider(null);
            }
        }

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
            $plannedCleaning->setProvider($this);
        }

        return $this;
    }

    public function removePlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if ($this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings->removeElement($plannedCleaning);
            // set the owning side to null (unless already changed)
            if ($plannedCleaning->getProvider() === $this) {
                $plannedCleaning->setProvider(null);
            }
        }

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @return Collection|CategoryProvider[]
     */
    public function getCategoryProvider(): Collection
    {
      
            return $this->providerCat;
        
    }

    public function addCategoryProvider(CategoryProvider $providerCat): self
    {
        if (!$this->providerCat->contains($providerCat)) {
            $this->providerCat[] = $providerCat;
            $providerCat->setIdProvider($this);
        }

        return $this;
    }

    public function removeCategoryProvider(CategoryProvider $providerCat): self
    {
        if ($this->providerCat->contains($providerCat)) {
            $this->providerCat->removeElement($providerCat);
            // set the owning side to null (unless already changed)
            if ($providerCat->getIdProvider() === $this) {
                $providerCat->setIdProvider(null);
            }
        }

        return $this;
    }
    /**
     * @return Collection|Availability[]
     */
    public function getAvailabilities(): Collection
    {
        return $this->availabilities;
    }

    public function addAvailability(Availability $availability): self
    {
        if (!$this->availabilities->contains($availability)) {
            $this->availabilities[] = $availability;
            $availability->setProvider($this);
        }

        return $this;
    }

    public function removeAvailability(Availability $availability): self
    {
        if ($this->availabilities->contains($availability)) {
            $this->availabilities->removeElement($availability);
            // set the owning side to null (unless already changed)
            if ($availability->getProvider() === $this) {
                $availability->setProvider(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return $this->name;
    }
}
