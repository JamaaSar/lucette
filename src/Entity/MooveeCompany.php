<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MooveeCompanyRepository")
 */
class MooveeCompany
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
     * @ORM\Column(type="string", length=32)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contact_mail_entreprise;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_date;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(mimeTypes={ "image/png", "image/jpg" })
     */
    private $photo;
    /**
     * @Assert\File(mimeTypes={ "image/png", "image/jpg" })
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Parkings", mappedBy="company")
     */
    private $parkings;

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

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getCodeEntreprise(): ?string
    {
        return $this->code_entreprise;
    }

    public function setCodeEntreprise(string $code_entreprise): self
    {
        $this->code_entreprise = $code_entreprise;

        return $this;
    }

    public function getContactEntreprise(): ?string
    {
        return $this->contact_entreprise;
    }

    public function setContactEntreprise(string $contact_entreprise): self
    {
        $this->contact_entreprise = $contact_entreprise;

        return $this;
    }

    public function getContactMailEntreprise(): ?string
    {
        return $this->contact_mail_entreprise;
    }

    public function setContactMailEntreprise(string $contact_mail_entreprise): self
    {
        $this->contact_mail_entreprise = $contact_mail_entreprise;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

  

    public function __construct()
    {
        $this->parkings = new ArrayCollection();
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Parkings[]
     */
    public function getParkings(): Collection
    {
        return $this->parkings;
    }

    public function addParking(Parkings $parking): self
    {
        if (!$this->parkings->contains($parking)) {
            $this->parkings[] = $parking;
            $parking->setCompany($this);
        }

        return $this;
    }

    public function removeParking(Parkings $parking): self
    {
        if ($this->parkings->contains($parking)) {
            $this->parkings->removeElement($parking);
            // set the owning side to null (unless already changed)
            if ($parking->getCompany() === $this) {
                $parking->setCompany(null);
            }
        }

        return $this;
    }
}
