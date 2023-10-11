<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $numAppart = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $superficie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descriptif = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAppart(): ?string
    {
        return $this->numAppart;
    }

    public function setNumAppart(?string $numAppart): static
    {
        $this->numAppart = $numAppart;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(?string $superficie): static
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): static
    {
        $this->descriptif = $descriptif;

        return $this;
    }
}
