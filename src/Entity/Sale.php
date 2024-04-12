<?php

namespace App\Entity;

use App\Repository\SaleRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource]
#[ORM\Entity(repositoryClass: SaleRepository::class)]
#[UniqueEntity(fields: ['idWine', 'idUser'], message: 'You have already bought this wine')]
class Sale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'idUser')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?Wine $idWine = null;

    #[ORM\OneToOne(inversedBy: 'saleList', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?User $idUser = null;

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

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(User $idUser): static
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
