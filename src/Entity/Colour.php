<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Colour
 *
 * @ORM\Table(name="colour")
 * @ORM\Entity(repositoryClass="App\Repository\ColourRepository")
 */
class Colour
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
     * @ORM\Column(name="car_colour", type="string", length=255, nullable=true)
     */
    private $carColour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OwnedVehicle", inversedBy="colour")
     * @ORM\JoinTable(name="colour_owned_vehicles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="colour_id", referencedColumnName="id")
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

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getCarColour(): ?string
    {
        return $this->carColour;
    }

    public function setCarColour(?string $carColour): self
    {
        $this->carColour = $carColour;

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

    /**
     * @param Collection $ownedVehicles
     */
    public function setOwnedVehicles(ArrayCollection|Collection $ownedVehicles): void
    {
        $this->ownedVehicles = $ownedVehicles;
    }



}
