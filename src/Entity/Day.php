<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'date')]
    private $dateOfService;

    #[ORM\ManyToOne(targetEntity: Lunch::class, inversedBy: 'days')]
    private $lunchOfTheDay;

    #[ORM\ManyToOne(targetEntity: Dinner::class, inversedBy: 'days')]
    private $dinnerOfTheDay;

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateOfService(): ?\DateTimeInterface
    {
        return $this->dateOfService;
    }

    public function setDateOfService(\DateTimeInterface $dateOfService): self
    {
        $this->dateOfService = $dateOfService;

        return $this;
    }

    public function getLunchOfTheDay(): ?Lunch
    {
        return $this->lunchOfTheDay;
    }

    public function setLunchOfTheDay(?Lunch $lunchOfTheDay): self
    {
        $this->lunchOfTheDay = $lunchOfTheDay;

        return $this;
    }

    public function getDinnerOfTheDay(): ?Dinner
    {
        return $this->dinnerOfTheDay;
    }

    public function setDinnerOfTheDay(?Dinner $dinnerOfTheDay): self
    {
        $this->dinnerOfTheDay = $dinnerOfTheDay;

        return $this;
    }
}
