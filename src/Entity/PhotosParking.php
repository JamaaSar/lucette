<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotosParkingRepository")
 */
class PhotosParking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(mimeTypes={ "image/png", "image/jpg" })
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parkings", inversedBy="photosParkings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parking;

    /**
     * @Assert\File(mimeTypes={ "image/png", "image/jpg" })
     */
    private $image;


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

    public function getParking(): ?Parkings
    {
        return $this->parking;
    }

    public function setParking(?Parkings $parking): self
    {
        $this->parking = $parking;

        return $this;
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
}
