<?php

namespace App\Entity;

use App\Repository\ImmeubleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleRepository::class)]
class Immeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $numImmeube = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $nomImmeuble = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $rueImmeuble = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $cpImmeuble = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $villeImmeuble = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumImmeube(): ?string
    {
        return $this->numImmeube;
    }

    public function setNumImmeube(?string $numImmeube): static
    {
        $this->numImmeube = $numImmeube;

        return $this;
    }

    public function getNomImmeuble(): ?string
    {
        return $this->nomImmeuble;
    }

    public function setNomImmeuble(?string $nomImmeuble): static
    {
        $this->nomImmeuble = $nomImmeuble;

        return $this;
    }

    public function getRueImmeuble(): ?string
    {
        return $this->rueImmeuble;
    }

    public function setRueImmeuble(?string $rueImmeuble): static
    {
        $this->rueImmeuble = $rueImmeuble;

        return $this;
    }

    public function getCpImmeuble(): ?string
    {
        return $this->cpImmeuble;
    }

    public function setCpImmeuble(?string $cpImmeuble): static
    {
        $this->cpImmeuble = $cpImmeuble;

        return $this;
    }

    public function getVilleImmeuble(): ?string
    {
        return $this->villeImmeuble;
    }

    public function setVilleImmeuble(?string $villeImmeuble): static
    {
        $this->villeImmeuble = $villeImmeuble;

        return $this;
    }
}
