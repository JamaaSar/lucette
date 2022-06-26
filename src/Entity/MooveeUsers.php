<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MooveeUsersRepository")
 */
class MooveeUsers implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $code_company;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $number_and_street;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $customerToken;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $pwResetToken;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @Assert\Length(max=4096, min="6", minMessage="Your Password must contain at least 6 charaters")
     */
    private $plainPassword;

    /**
     * @Assert\Length(max=4096)
     */
    private $oldPassword;

    /**
     * @Assert\Length(max=4096)
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MooveeUserHasCar", mappedBy="user_has_car_id_user")
     */
    private $mooveeUserHasCars;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="mooveeUsers")
     */
    private $Provider;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlannedCleaning", mappedBy="userid")
     */
    private $plannedCleanings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Planing", mappedBy="user")
     */
    private $planings;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_deleted;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CreditCard", mappedBy="customerId")
     */
    private $creditCards;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $verifyToken;
    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":false})
     */
    private $googleToken;
    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":true})
     */
    private $subscribe;


    public function __construct()
    {
        $this->mooveeUserHasCars = new ArrayCollection();
        $this->plannedCleanings = new ArrayCollection();
        $this->planings = new ArrayCollection();
        $this->creditCards = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getCodeCompany(): ?string
    {
        return $this->code_company;
    }

    public function setCodeCompany(?string $code_company): self
    {
        $this->code_company = $code_company;

        return $this;
    }

    public function getNumberAndStreet(): ?string
    {
        return $this->number_and_street;
    }

    public function setNumberAndStreet(?string $number_and_street): self
    {
        $this->number_and_street = $number_and_street;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(?string $zip_code): self
    {
        $this->zip_code = $zip_code;

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

    public function getCustomerToken(): ?string
    {
        return $this->customerToken;
    }

    public function setCustomerToken(?string $customerToken): self
    {
        $this->customerToken = $customerToken;

        return $this;
    }

    public function getPwResetToken(): ?\DateTimeInterface
    {
        return $this->pwResetToken;
    }

    public function setPwResetToken(?\DateTimeInterface $pwResetToken): self
    {
        $this->pwResetToken = $pwResetToken;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(?\DateTimeInterface $created_date): self
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function setSalt(string $salt): self
    {
        $this->salt = $salt;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }


    public function getOldPassword()
    {
        return $this->oldPassword;
    }

    public function setOldPassword($password)
    {
        $this->oldPassword = $password;
    }


    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function eraseCredentials()
    {
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
            $mooveeUserHasCar->setUserHasCarIdUser($this);
        }

        return $this;
    }




    public function removeMooveeUserHasCar(MooveeUserHasCar $mooveeUserHasCar): self
    {
        if ($this->mooveeUserHasCars->contains($mooveeUserHasCar)) {
            $this->mooveeUserHasCars->removeElement($mooveeUserHasCar);
            // set the owning side to null (unless already changed)
            if ($mooveeUserHasCar->getUserHasCarIdUser() === $this) {
                $mooveeUserHasCar->setUserHasCarIdUser(null);
            }
        }

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->Provider;
    }

    public function setProvider(?Provider $Provider): self
    {
        $this->Provider = $Provider;

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
            $plannedCleaning->setUserid($this);
        }

        return $this;
    }

    public function removePlannedCleaning(PlannedCleaning $plannedCleaning): self
    {
        if ($this->plannedCleanings->contains($plannedCleaning)) {
            $this->plannedCleanings->removeElement($plannedCleaning);
            // set the owning side to null (unless already changed)
            if ($plannedCleaning->getUserid() === $this) {
                $plannedCleaning->setUserid(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Planing[]
     */
    public function getPlanings(): Collection
    {
        return $this->planings;
    }

    public function addPlaning(Planing $planing): self
    {
        if (!$this->planings->contains($planing)) {
            $this->planings[] = $planing;
            $planing->setUser($this);
        }

        return $this;
    }

    public function removePlaning(Planing $planing): self
    {
        if ($this->planings->contains($planing)) {
            $this->planings->removeElement($planing);
            // set the owning side to null (unless already changed)
            if ($planing->getUser() === $this) {
                $planing->setUser(null);
            }
        }

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(?bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    /**
     * @return Collection|CreditCard[]
     */
    public function getCreditCards(): Collection
    {
        return $this->creditCards;
    }

    public function addCreditCard(CreditCard $creditCard): self
    {
        if (!$this->creditCards->contains($creditCard)) {
            $this->creditCards[] = $creditCard;
            $creditCard->setCustomerId($this);
        }

        return $this;
    }

    public function removeCreditCard(CreditCard $creditCard): self
    {
        if ($this->creditCards->contains($creditCard)) {
            $this->creditCards->removeElement($creditCard);
            // set the owning side to null (unless already changed)
            if ($creditCard->getCustomerId() === $this) {
                $creditCard->setCustomerId(null);
            }
        }

        return $this;
    }

    public function getVerifyToken(): ?string
    {
        return $this->verifyToken;
    }

    public function setVerifyToken(?string $verifyToken): self
    {
        $this->verifyToken = $verifyToken;

        return $this;
    }
    public function getClients(): Collection
    {
        return $this->listDeclients;
    }


    public function getGoogleToken(): ?bool
    {
        return $this->googleToken;
    }

    public function setGoogleToken(?bool $googleToken): self
    {
        $this->googleToken = $googleToken;

        return $this;
    }


    public function getSubscribe(): ?bool
    {
        return $this->subscribe;
    }

    public function setSubscribe(?bool $subscribe): self
    {
        $this->subscribe = $subscribe;

        return $this;
    }
}
