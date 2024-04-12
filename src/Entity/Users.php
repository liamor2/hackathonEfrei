<?php

namespace App\Entity;

use App\Repository\UsersRepository;
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
#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'This email is already in use')]
class Users
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
    private ?Sales $salesList = null;

    /**
     * @var Collection<int, Comments>
     */
    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'idUser')]
    private Collection $listComments;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $creationDate;

    public function __construct()
    {
        $this->listComments = new ArrayCollection();
        $this->role = 'user';
        $this->creationDate = new \DateTime();
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

    public function getSalesList(): ?Sales
    {
        return $this->salesList;
    }

    public function setSalesList(Sales $salesList): static
    {
        // set the owning side of the relation if necessary
        if ($salesList->getIdUser() !== $this) {
            $salesList->setIdUser($this);
        }

        $this->salesList = $salesList;

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getListComments(): Collection
    {
        return $this->listComments;
    }

    public function addListComment(Comments $listComment): static
    {
        if (!$this->listComments->contains($listComment)) {
            $this->listComments->add($listComment);
            $listComment->setIdUser($this);
        }

        return $this;
    }

    public function removeListComment(Comments $listComment): static
    {
        if ($this->listComments->removeElement($listComment)) {
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
