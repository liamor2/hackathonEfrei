<?php

namespace App\Entity;

use App\Repository\WineRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ApiResource]
#[ORM\Entity(repositoryClass: WineRepository::class)]
#[UniqueEntity(fields: ['name', 'vintage', 'domain', 'region'], message: 'This wine already exists')]
class Wine
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
    private ?string $region = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $domain = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $country = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero]
    #[Assert\NotBlank]
    private ?string $alcohol = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $sparkling = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 15, scale: 2, nullable: true)]
    #[Assert\PositiveOrZero]
    #[Assert\NotBlank]
    private ?string $volume = null;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $bio = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $url = null;

    #[ORM\Column(length: 511)]
    #[Assert\NotBlank]
    private ?string $varietal = null;

    #[ORM\Column]
    #[Assert\PositiveOrZero]
    private ?int $vintage = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $description = null;

    /**
     * @var Collection<int, Sales>
     */
    #[ORM\OneToMany(targetEntity: Sales::class, mappedBy: 'idWine', orphanRemoval: true)]
    private Collection $salesList;

    /**
     * @var Collection<int, Comments>
     */
    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'idWine')]
    private Collection $listComments;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $creationDate;

    public function __construct()
    {
        $this->salesList = new ArrayCollection();
        $this->listComments = new ArrayCollection();
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

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): static
    {
        $this->domain = $domain;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getAlcohol(): ?string
    {
        return $this->alcohol;
    }

    public function setAlcohol(?string $alcohol): static
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    public function isSparkling(): ?bool
    {
        return $this->sparkling;
    }

    public function setSparkling(bool $sparkling): static
    {
        $this->sparkling = $sparkling;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(?string $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function isBio(): ?bool
    {
        return $this->bio;
    }

    public function setBio(bool $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getVarietal(): ?string
    {
        return $this->varietal;
    }

    public function setVarietal(string $varietal): static
    {
        $this->varietal = $varietal;

        return $this;
    }

    public function getVintage(): ?int
    {
        return $this->vintage;
    }

    public function setVintage(int $vintage): static
    {
        $this->vintage = $vintage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Sales>
     */
    public function getSalesList(): Collection
    {
        return $this->salesList;
    }

    public function addSalesList(Sales $salesList): static
    {
        if (!$this->salesList->contains($salesList)) {
            $this->salesList->add($salesList);
            $salesList->setIdWine($this);
        }

        return $this;
    }

    public function removeSalesList(Sales $salesList): static
    {
        if ($this->salesList->removeElement($salesList)) {
            // set the owning side to null (unless already changed)
            if ($salesList->getIdWine() === $this) {
                $salesList->setIdWine(null);
            }
        }

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
            $listComment->setIdWine($this);
        }

        return $this;
    }

    public function removeListComment(Comments $listComment): static
    {
        if ($this->listComments->removeElement($listComment)) {
            // set the owning side to null (unless already changed)
            if ($listComment->getIdWine() === $this) {
                $listComment->setIdWine(null);
            }
        }

        return $this;
    }
}
