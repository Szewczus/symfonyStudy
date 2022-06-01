<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OwnedVehicle
 *
 * @ORM\Table(name="owned_vehicle", indexes={@ORM\Index(name="FKc9jm6t191gl9c412pmamwk42f", columns={"fk_owner_id"}), @ORM\Index(name="FKcv5fgqr011hogqqvb37eaa46y", columns={"fk_body_style_id"}), @ORM\Index(name="FKgp2wka7k9qjdjhrpi7eyb4mmf", columns={"fk_vehicle_id"}), @ORM\Index(name="FKn83w5sdno7nrkvy6306h1s7u9", columns={"fk_colour_id"})})
 * @ORM\Entity
 */
class OwnedVehicle
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
     * @ORM\Column(name="production_date", type="datetime", nullable=true)
     */
    private $productionDate;

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
     * @var \BodyStyle
     *
     * @ORM\ManyToOne(targetEntity="BodyStyle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_body_style_id", referencedColumnName="id")
     * })
     */
    private $fkBodyStyle;

    /**
     * @var \Vehicle
     *
     * @ORM\ManyToOne(targetEntity="Vehicle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_vehicle_id", referencedColumnName="id")
     * })
     */
    private $fkVehicle;

    /**
     * @var \Colour
     *
     * @ORM\ManyToOne(targetEntity="Colour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_colour_id", referencedColumnName="id")
     * })
     */
    private $fkColour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="BodyStyle", mappedBy="ownedVehicles")
     */
    private $bodyStyle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Colour", mappedBy="ownedVehicles")
     */
    private $colour;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Owner", mappedBy="ownedVehicles")
     */
    private $owner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Vehicle", mappedBy="ownedVehicles")
     */
    private $vehicle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bodyStyle = new \Doctrine\Common\Collections\ArrayCollection();
        $this->colour = new \Doctrine\Common\Collections\ArrayCollection();
        $this->owner = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehicle = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getProductionDate(): ?\DateTimeInterface
    {
        return $this->productionDate;
    }

    public function setProductionDate(?\DateTimeInterface $productionDate): self
    {
        $this->productionDate = $productionDate;

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

    public function getFkBodyStyle(): ?BodyStyle
    {
        return $this->fkBodyStyle;
    }

    public function setFkBodyStyle(?BodyStyle $fkBodyStyle): self
    {
        $this->fkBodyStyle = $fkBodyStyle;

        return $this;
    }

    public function getFkVehicle(): ?Vehicle
    {
        return $this->fkVehicle;
    }

    public function setFkVehicle(?Vehicle $fkVehicle): self
    {
        $this->fkVehicle = $fkVehicle;

        return $this;
    }

    public function getFkColour(): ?Colour
    {
        return $this->fkColour;
    }

    public function setFkColour(?Colour $fkColour): self
    {
        $this->fkColour = $fkColour;

        return $this;
    }

    /**
     * @return Collection<int, BodyStyle>
     */
    public function getBodyStyle(): Collection
    {
        return $this->bodyStyle;
    }

    public function addBodyStyle(BodyStyle $bodyStyle): self
    {
        if (!$this->bodyStyle->contains($bodyStyle)) {
            $this->bodyStyle[] = $bodyStyle;
            $bodyStyle->addOwnedVehicle($this);
        }

        return $this;
    }

    public function removeBodyStyle(BodyStyle $bodyStyle): self
    {
        if ($this->bodyStyle->removeElement($bodyStyle)) {
            $bodyStyle->removeOwnedVehicle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Colour>
     */
    public function getColour(): Collection
    {
        return $this->colour;
    }

    public function addColour(Colour $colour): self
    {
        if (!$this->colour->contains($colour)) {
            $this->colour[] = $colour;
            $colour->addOwnedVehicle($this);
        }

        return $this;
    }

    public function removeColour(Colour $colour): self
    {
        if ($this->colour->removeElement($colour)) {
            $colour->removeOwnedVehicle($this);
        }

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
            $owner->addOwnedVehicle($this);
        }

        return $this;
    }

    public function removeOwner(Owner $owner): self
    {
        if ($this->owner->removeElement($owner)) {
            $owner->removeOwnedVehicle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    public function getVehicle(): Collection
    {
        return $this->vehicle;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicle->contains($vehicle)) {
            $this->vehicle[] = $vehicle;
            $vehicle->addOwnedVehicle($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicle->removeElement($vehicle)) {
            $vehicle->removeOwnedVehicle($this);
        }

        return $this;
    }

}
