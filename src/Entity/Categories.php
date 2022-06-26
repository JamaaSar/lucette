<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=65535)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryLocation", mappedBy="id_category")
     */

    private $idcat;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryProvider", mappedBy="id_category")
     */

    private $cats;

   

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="id_category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idservice;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="categoryService")
     */

    private $products;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $needCar;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\File(mimeTypes={ "image/png", "image/jpg", "image/jpeg" })
     */
    private $photo;

    /**
     * @Assert\File(mimeTypes={ "image/png", "image/jpg", "image/jpeg" })
     */
    private $image;

    public function __construct()
    {
        $this->cats = new ArrayCollection();
        $this->products = new ArrayCollection();
    }


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

    public function getNeedCar(): ?bool
    {
        return $this->needCar;
    }

    public function setNeedCar(?bool $needCar): self
    {
        $this->needCar = $needCar;

        return $this;
    }
    /**
     * @return Collection|CategoryProvider[]
     */
    public function getIdCategory(): Collection
    {
        return $this->cats;
    }

    public function addIdCategory(CategoryProvider $cat): self
    {
        if (!$this->cats->contains($cat)) {
            $this->cats[] = $cat;
            $cat->setIdCategory($this);
        }

        return $this;
    }

    /*
    public function removeIdCategory(CategoryProvider $cat): self
    {
        if ($this->cats->contains($cat)) {
            $this->cats->removeElement($cat);
            // set the owning side to null (unless already changed)
            if ($cat->getIdCategory() === $this) {
                $cat->setIdCategory('null');
            }
        }

        return $this;
    }
  */
    /**
     * @return Collection|Products[]
     */
    public function getIdProduct(): Collection
    {
        return $this->products;
    }

    public function addIdProduct(Products $products): self
    {
        if (!$this->products->contains($products)) {
            $this->products[] = $products;
            $products->setCategory($this);
        }

        return $this;
    }


    public function removeIdProduct(Products $products): self
    {
        if ($this->products->contains($products)) {
            $this->products->removeElement($products);
            // set the owning side to null (unless already changed)
            if ($products->getCategory() === $this) {
                $products->setCategory(null);
            }
        }

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
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function getService(): ?Service
    {
        return $this->idservice;
    }

    public function setService(Service $idservice): Service
    {
        return $this->idservice = $idservice;
    }
}
