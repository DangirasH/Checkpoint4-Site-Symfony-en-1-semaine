<?php

namespace App\Entity;

use App\Repository\TravelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TravelRepository::class)]
class Travel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $location;

    #[ORM\Column(type: 'string', length: 255)]
    private string $address;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $date;

    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    #[ORM\Column(type: 'string', length: 255)]
    private string $country;

    #[ORM\OneToMany(mappedBy: 'travel', targetEntity: Recomendations::class, orphanRemoval: true)]
    private Collection $recomendations;

    public function __construct()
    {
        $this->recomendations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, Recomendations>
     */
    public function getRecomendations(): Collection
    {
        return $this->recomendations;
    }

    public function addRecomendation(Recomendations $recomendation): self
    {
        if (!$this->recomendations->contains($recomendation)) {
            $this->recomendations[] = $recomendation;
            $recomendation->setTravel($this);
        }

        return $this;
    }

    public function removeRecomendation(Recomendations $recomendation): self
    {
        if ($this->recomendations->removeElement($recomendation)) {
            // set the owning side to null (unless already changed)
            if ($recomendation->getTravel() === $this) {
                $recomendation->setTravel(null);
            }
        }

        return $this;
    }
}
