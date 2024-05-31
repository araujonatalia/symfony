<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $documento = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $cargo = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $direccion = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $ciudad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    public function setDocumento(int $documento): static
    {
        $this->documento = $documento;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(?string $cargo): static
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): static
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}
