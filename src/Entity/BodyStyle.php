<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BodyStyle
 *
 * @ORM\Table(name="body_style")
 * @ORM\Entity
 */
class BodyStyle
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
     * @ORM\Column(name="door_number", type="integer", nullable=true)
     */
    private $doorNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="style", type="string", length=255, nullable=true)
     */
    private $style;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OwnedVehicle", inversedBy="bodyStyle")
     * @ORM\JoinTable(name="body_style_owned_vehicles",
     *   joinColumns={
     *     @ORM\JoinColumn(name="body_style_id", referencedColumnName="id")
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

    public function getDoorNumber(): ?int
    {
        return $this->doorNumber;
    }

    public function setDoorNumber(?int $doorNumber): self
    {
        $this->doorNumber = $doorNumber;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): self
    {
        $this->style = $style;

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
