<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Owner
 *
 * @ORM\Table(name="owner")
 * @ORM\Entity
 */
class Owner
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    private $birthdate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pesel", type="bigint", nullable=true)
     */
    private $pesel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Address", inversedBy="owner")
     * @ORM\JoinTable(name="owner_addresses",
     *   joinColumns={
     *     @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="addresses_id", referencedColumnName="id")
     *   }
     * )
     */
    private $addresses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OwnedVehicle", inversedBy="owner")
     * @ORM\JoinTable(name="owner_owned_vehicles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="owned_vehicles_id", referencedColumnName="id")
     *   }
     * )
     */
    private $ownedVehicles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ownedVehicles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(?\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPesel(): ?string
    {
        return $this->pesel;
    }

    public function setPesel(?string $pesel): self
    {
        $this->pesel = $pesel;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return Collection<int, Address>
     */
    public function getAddresses(): Collection
    {
        return $this->addresses;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->addresses->contains($address)) {
            $this->addresses[] = $address;
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        $this->addresses->removeElement($address);

        return $this;
    }

    /**
     * @return Collection<int, OwnedVehicle>
     */
    public function getOwnedVehicles(): Collection
    {
        return $this->ownedVehicles;
    }

    public function addOwnedVehicle(OwnedVehicle $ownedVehicle): self
    {
        if (!$this->ownedVehicles->contains($ownedVehicle)) {
            $this->ownedVehicles[] = $ownedVehicle;
        }

        return $this;
    }

    public function removeOwnedVehicle(OwnedVehicle $ownedVehicle): self
    {
        $this->ownedVehicles->removeElement($ownedVehicle);

        return $this;
    }

}
