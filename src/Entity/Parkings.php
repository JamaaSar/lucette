<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParkingsRepository")
 */
class Parkings
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
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_deleted;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MooveeCompany", inversedBy="parkings")
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;
 
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PhotosParking", mappedBy="parking")
     */
    private $photosParkings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaning", mappedBy="parkingId")
     */
    private $plannedCleanings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Availability", mappedBy="parking")
     */
    private $availabilities;

   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryLocation", mappedBy="id_location")
     */ 

    private $parkingCat;

    public function __construct()
    {
        $this->photosParkings = new ArrayCollection();
        $this->plannedCleanings = new ArrayCollection();
        $this->availabilities = new ArrayCollection();
        $this->categories = new ArrayCollection();
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

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

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

    public function setUpdatedDate(\DateTimeInterface  $updated_date): self
    {
        $this->updated_date = $updated_date;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    public function getCompany(): ?MooveeCompany
    {
        return $this->company;
    }

    public function setCompany(?MooveeCompany $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return Collection|PhotosParking[]
     */
    public function getPhotosParkings(): Collection
    {
        return $this->photosParkings;
    }

    public function addPhotosParking(PhotosParking $photosParking): self
    {
        if (!$this->photosParkings->contains($photosParking)) {
            $this->photosParkings[] = $photosParking;
            $photosParking->setParking($this);
        }

        return $this;
    }

    public function removePhotosParking(PhotosParking $photosParking): self
    {
        if ($this->photosParkings->contains($photosParking)) {
            $this->photosParkings->removeElement($photosParking);
            // set the owning side to null (unless already changed)
            if ($photosParking->getParking() === $this) {
                $photosParking->setParking(null);
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
            $plannedCleaning->setParkingId($this);
        }

        return $this;
    }

    public function removePlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if ($this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings->removeElement($plannedCleaning);
            // set the owning side to null (unless already changed)
            if ($plannedCleaning->getParkingId() === $this) {
                $plannedCleaning->setParkingId(null);
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
            $availability->setParking($this);
        }

        return $this;
    }

    public function removeAvailability(Availability $availability): self
    {
        if ($this->availabilities->contains($availability)) {
            $this->availabilities->removeElement($availability);
            // set the owning side to null (unless already changed)
            if ($availability->getParking() === $this) {
                $availability->setParking(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }
   
    /**
     * @return Collection|CategoryLocation[]
     */
    public function getCategoryLocation(): Collection
    {
        return $this->parkingCat;
    }

    public function addCategoryLocation(CategoryLocation $parkingCat): self
    {
        if (!$this->parkingCat->contains($parkingCat)) {
            $this->parkingCat[] = $parkingCat;
            $parkingCat->setIdParking($this);
        }

        return $this;
    }

    public function removeCategoryLocation(CategoryLocation $parkingCat): self
    {
        if ($this->parkingCat->contains($parkingCat)) {
            $this->parkingCat->removeElement($parkingCat);
            // set the owning side to null (unless already changed)
            if ($parkingCat->getIdParking() === $this) {
                $parkingCat->setIdParking(null);
            }
        }

        return $this;
    }
}
