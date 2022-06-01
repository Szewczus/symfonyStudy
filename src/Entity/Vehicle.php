<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle")
 * @ORM\Entity
 */
class Vehicle
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
     * @var string|null
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @var string|null
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OwnedVehicle", inversedBy="vehicle")
     * @ORM\JoinTable(name="vehicle_owned_vehicles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
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
        $this->ownedVehicles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

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
