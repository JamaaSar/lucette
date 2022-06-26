<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionRepository")
 * @Orm\Table(name="`moovee_opt`")
 */
class Option
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products", inversedBy="option")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CategoryOption", mappedBy="id_option", cascade={"merge", "persist"}, orphanRemoval=true)
     */
    private $category_option;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $commission;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supprime;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaningOptions", mappedBy="option_id")
     */
    private $plannedCleaningOptions;


    public function __construct()
    {
        $this->category_option = new ArrayCollection();
        $this->plannedCleaningOptions = new ArrayCollection();
    }




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

    public function setCommission( $commission): self
    {
        $this->commission = $commission;

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
     * @return Collection|CategoryOption[]
     */
    public function getCategoryOption(): Collection
    {
        return $this->category_option;
    }

    public function addCategoryOption(CategoryOption $categoryOption): self
    {
        if (!$this->category_option->contains($categoryOption)) {
            $this->category_option[] = $categoryOption;
            $categoryOption->setIdOption($this);
        }

        return $this;
    }

    public function removeCategoryOption(CategoryOption $categoryOption): self
    {
        if ($this->category_option->contains($categoryOption)) {
            $this->category_option->removeElement($categoryOption);
            // set the owning side to null (unless already changed)
            if ($categoryOption->getIdOption() === $this) {
                $categoryOption->setIdOption(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PlannedCleaningOptions[]
     */
    public function getPlannedCleaningOptions(): Collection
    {
        return $this->plannedCleaningOptions;
    }

    public function addPlannedCleaningOption(PlannedCleaningOptions $plannedCleaningOption): self
    {
        if (!$this->plannedCleaningOptions->contains($plannedCleaningOption)) {
            $this->plannedCleaningOptions[] = $plannedCleaningOption;
            $plannedCleaningOption->setOptionId($this);
        }

        return $this;
    }

    public function removePlannedCleaningOption(PlannedCleaningOptions $plannedCleaningOption): self
    {
        if ($this->plannedCleaningOptions->contains($plannedCleaningOption)) {
            $this->plannedCleaningOptions->removeElement($plannedCleaningOption);
            // set the owning side to null (unless already changed)
            if ($plannedCleaningOption->getOptionId() === $this) {
                $plannedCleaningOption->setOptionId(null);
            }
        }

        return $this;
    }




}
