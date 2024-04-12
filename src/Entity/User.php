<?php

namespace App\Entity;

use App\Repository\UserRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource
(
    operations:
    [
        new Get,
        new GetCollection,
        new Post,
        new Delete
    ]
)]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'This email is already in use')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $address = null;

    #[ORM\Column(length: 4)]
    #[Assert\NotBlank]
    private ?string $role = null;

    #[ORM\Column(length: 15)]
    private ?string $phone = null;

    #[ORM\OneToOne(mappedBy: 'idUser', cascade: ['persist', 'remove'])]
    private ?Sale $saleList = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'idUser')]
    private Collection $listComment;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    public function __construct()
    {
        $this->listComment = new ArrayCollection();
        $this->role = 'user';
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSaleList(): ?Sale
    {
        return $this->saleList;
    }

    public function setSaleList(Sale $saleList): static
    {
        // set the owning side of the relation if necessary
        if ($saleList->getIdUser() !== $this) {
            $saleList->setIdUser($this);
        }

        $this->saleList = $saleList;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getListComment(): Collection
    {
        return $this->listComment;
    }

    public function addListComment(Comment $listComment): static
    {
        if (!$this->listComment->contains($listComment)) {
            $this->listComment->add($listComment);
            $listComment->setIdUser($this);
        }

        return $this;
    }

    public function removeListComment(Comment $listComment): static
    {
        if ($this->listComment->removeElement($listComment)) {
            // set the owning side to null (unless already changed)
            if ($listComment->getIdUser() === $this) {
                $listComment->setIdUser(null);
            }
        }

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }
}
