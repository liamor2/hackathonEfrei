<?php

namespace App\Entity;

use App\Repository\SalesRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource]
#[ORM\Entity(repositoryClass: SalesRepository::class)]
#[UniqueEntity(fields: ['idWine', 'idUser'], message: 'You have already bought this wine')]
class Sales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'idUser')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?Wine $idWine = null;

    #[ORM\OneToOne(inversedBy: 'salesList', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?Users $idUser = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 20, scale: 2)]
    private ?string $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdWine(): ?Wine
    {
        return $this->idWine;
    }

    public function setIdWine(?Wine $idWine): static
    {
        $this->idWine = $idWine;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->idUser;
    }

    public function setIdUser(Users $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }
}
