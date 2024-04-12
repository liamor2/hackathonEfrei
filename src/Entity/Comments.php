<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource]
#[ORM\Entity(repositoryClass: CommentsRepository::class)]
#[UniqueEntity(fields: ['idWine', 'idUser'], message: 'You have already commented on this wine')]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'listComments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?Wine $idWine = null;

    #[ORM\ManyToOne(inversedBy: 'listComments')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank]
    private ?Users $idUser = null;

    #[ORM\Column(length: 255)]
    private ?string $review = null;

    #[ORM\Column]
    private ?int $score = null;

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

    public function setIdUser(?Users $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(string $review): static
    {
        $this->review = $review;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }
}
