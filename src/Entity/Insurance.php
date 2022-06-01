<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Insurance
 *
 * @ORM\Table(name="insurance", indexes={@ORM\Index(name="FK8k56jgxsl6sux4v01o7sgelak", columns={"fk_owned_vehicle_id"}), @ORM\Index(name="FKtbbgpgw0bou7onkao30jvkf9w", columns={"fk_type_id"})})
 * @ORM\Entity
 */
class Insurance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="expiration", type="datetime", nullable=true)
     */
    private $expiration;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @var \OwnedVehicle
     *
     * @ORM\ManyToOne(targetEntity="OwnedVehicle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_owned_vehicle_id", referencedColumnName="id")
     * })
     */
    private $fkOwnedVehicle;

    /**
     * @var \InsuranceType
     *
     * @ORM\ManyToOne(targetEntity="InsuranceType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_type_id", referencedColumnName="id")
     * })
     */
    private $fkType;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->expiration;
    }

    public function setExpiration(?\DateTimeInterface $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getFkOwnedVehicle(): ?OwnedVehicle
    {
        return $this->fkOwnedVehicle;
    }

    public function setFkOwnedVehicle(?OwnedVehicle $fkOwnedVehicle): self
    {
        $this->fkOwnedVehicle = $fkOwnedVehicle;

        return $this;
    }

    public function getFkType(): ?InsuranceType
    {
        return $this->fkType;
    }

    public function setFkType(?InsuranceType $fkType): self
    {
        $this->fkType = $fkType;

        return $this;
    }


}
