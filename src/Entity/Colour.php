<?php

namespace App\Entity;

use App\Repository\ColourRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ColourRepository::class)]
class Colour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $carColour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarColour(): ?string
    {
        return $this->carColour;
    }

    public function setCarColour(string $carColour): self
    {
        $this->carColour = $carColour;

        return $this;
    }
}
