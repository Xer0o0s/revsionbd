<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $numReserv = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateReserv = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $nomClient = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $prenomClient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumReserv(): ?string
    {
        return $this->numReserv;
    }

    public function setNumReserv(?string $numReserv): static
    {
        $this->numReserv = $numReserv;

        return $this;
    }

    public function getDateReserv(): ?\DateTimeInterface
    {
        return $this->dateReserv;
    }

    public function setDateReserv(?\DateTimeInterface $dateReserv): static
    {
        $this->dateReserv = $dateReserv;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(?string $nomClient): static
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(?string $prenomClient): static
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }
}
