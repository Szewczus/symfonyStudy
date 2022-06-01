<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address", indexes={@ORM\Index(name="FKjd9io3xe03lfli05kwcp1yp5w", columns={"fk_owner_id"})})
 * @ORM\Entity
 */
class Address
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
     * @var int|null
     *
     * @ORM\Column(name="apartment_number", type="integer", nullable=true)
     */
    private $apartmentNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var int|null
     *
     * @ORM\Column(name="house_number", type="integer", nullable=true)
     */
    private $houseNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var \Owner
     *
     * @ORM\ManyToOne(targetEntity="Owner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_owner_id", referencedColumnName="id")
     * })
     */
    private $fkOwner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Owner", mappedBy="addresses")
     */
    private $owner;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->owner = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getApartmentNumber(): ?int
    {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber(?int $apartmentNumber): self
    {
        $this->apartmentNumber = $apartmentNumber;

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

    public function getHouseNumber(): ?int
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(?int $houseNumber): self
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getFkOwner(): ?Owner
    {
        return $this->fkOwner;
    }

    public function setFkOwner(?Owner $fkOwner): self
    {
        $this->fkOwner = $fkOwner;

        return $this;
    }

    /**
     * @return Collection<int, Owner>
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    public function addOwner(Owner $owner): self
    {
        if (!$this->owner->contains($owner)) {
            $this->owner[] = $owner;
            $owner->addAddress($this);
        }

        return $this;
    }

    public function removeOwner(Owner $owner): self
    {
        if ($this->owner->removeElement($owner)) {
            $owner->removeAddress($this);
        }

        return $this;
    }

}
