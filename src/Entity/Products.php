<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
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
     * @ORM\Column(type="string", length=1000)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Option", mappedBy="id_product")
     */
    private $option;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryProduct", mappedBy="id_product",cascade={"merge", "persist"}, orphanRemoval=true)
     */
    private $categoryProducts;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="products")
     */
    private $id_provider;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="products")
     */
    private $categoryService;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supprime;
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $commission;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaning", mappedBy="produit")
     */
    private $plannedCleanings;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $directBuy;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autoValide;
    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     * @Assert\File(mimeTypes={ "image/png", "image/jpg", "image/jpeg" })
     */
    private $photo;



    /**
     * @Assert\File(mimeTypes={ "image/png", "image/jpg", "image/jpeg" })
     */
    private $image;




    public function __construct()
    {
        $this->option = new ArrayCollection();
        $this->categoryProducts = new ArrayCollection();
        $this->plannedCleanings = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getCommission()
    {
        return $this->commission;
    }

    public function setCommission($commission): self
    {

        $this->commission = $commission;

        return $this;
    }
    public function getDirectBuy(): ?bool
    {
        return $this->directBuy;
    }

    public function setDirectBuy(?bool $directBuy): self
    {
        $this->directBuy = $directBuy;

        return $this;
    }


    public function getAutoValide(): ?bool
    {
        return $this->autoValide;
    }

    public function setAutoValide(?bool $autoValide): self
    {
        $this->autoValide = $autoValide;

        return $this;
    }
    public function getCategory(): ?Categories
    {
        return $this->categoryService;
    }

    public function setCategory(?Categories $categoryService): self
    {
        $this->categoryService = $categoryService;

        return $this;
    }
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
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


    /**
     * @return Collection|Option[]
     */
    public function getOption(): Collection
    {
        return $this->option;
    }

    public function addOption(Option $nameOption): self
    {
        if (!$this->option->contains($nameOption)) {
            $this->option[] = $nameOption;
            $nameOption->setIdProduct($this);
        }

        return $this;
    }

    public function removeNameOption(Option $nameOption): self
    {
        if ($this->option->contains($nameOption)) {
            $this->option->removeElement($nameOption);
            // set the owning side to null (unless already changed)
            if ($nameOption->getIdProduct() === $this) {
                $nameOption->setIdProduct(null);
            }
        }

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
     * @return Collection|CategoryProduct[]
     */
    public function getCategoryProducts(): Collection
    {
        return $this->categoryProducts;
    }
 
    public function addCategoryProduct(CategoryProduct $categoryProduct): self
    {
        if (!$this->categoryProducts->contains($categoryProduct)) {
            $this->categoryProducts[] = $categoryProduct;
            $categoryProduct->setIdProduct($this);
        }

        return $this;
    }

    public function removeCategoryProduct(CategoryProduct $categoryProduct): self
    {
        if ($this->categoryProducts->contains($categoryProduct)) {
            $this->categoryProducts->removeElement($categoryProduct);
            // set the owning side to null (unless already changed)
            if ($categoryProduct->getIdProduct() === $this) {
                $categoryProduct->setIdProduct(null);
            }
        }

        return $this;
    }



    public function getIdProvider(): ?Provider
    {
        return $this->id_provider;
    }

    public function setIdProvider(?Provider $id_provider): self
    {
        $this->id_provider = $id_provider;

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
            $plannedCleaning->setProduit($this);
        }

        return $this;
    }

    public function removePlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if ($this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings->removeElement($plannedCleaning);
            // set the owning side to null (unless already changed)
            if ($plannedCleaning->getProduit() === $this) {
                $plannedCleaning->setProduit(null);
            }
        }

        return $this;
    }
}
