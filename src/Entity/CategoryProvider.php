<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryProviderRepository")
 */
class CategoryProvider
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="providerCat")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_provider;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="cats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_category;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdCategory(): ?Categories
    {
        return $this->id_category;
    }

    public function setIdCategory(Categories $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }
}
