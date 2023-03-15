<?php

namespace App\Entity;

use App\Repository\ExpoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpoRepository::class)]
class Expo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urlExpoImage = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $expoText = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 32)]
    private ?string $startDate = null;

    #[ORM\Column(length: 32, nullable: true)]
    private ?string $endDate = null;

    #[ORM\Column(length: 4)]
    private ?string $year1 = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $year2 = null;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'expos')]
    private Collection $artists;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlExpoImage(): ?string
    {
        return $this->urlExpoImage;
    }

    public function setUrlExpoImage(?string $urlExpoImage): self
    {
        $this->urlExpoImage = $urlExpoImage;

        return $this;
    }

    public function getExpoText(): ?string
    {
        return $this->expoText;
    }

    public function setExpoText(?string $expoText): self
    {
        $this->expoText = $expoText;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getYear1(): ?string
    {
        return $this->year1;
    }

    public function setYear1(string $year1): self
    {
        $this->year1 = $year1;

        return $this;
    }

    public function getYear2(): ?string
    {
        return $this->year2;
    }

    public function setYear2(?string $year2): self
    {
        $this->year2 = $year2;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
            $artist->addExpo($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            $artist->removeExpo($this);
        }

        return $this;
    }
}
