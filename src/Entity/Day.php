<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\ORM\Mapping as ORM;
use IntlDateFormatter;

#[ORM\Entity(repositoryClass: DayRepository::class)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $dateOfService;

    #[ORM\OneToOne(inversedBy: 'day', cascade: ['persist', 'remove'])]
    private ?Lunch $lunch = null;

    #[ORM\OneToOne(inversedBy: 'day', cascade: ['persist', 'remove'])]
    private ?Dinner $dinner = null;


    public function __toString()
    {
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');
        $fmt = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Europe/Paris',
            IntlDateFormatter::GREGORIAN,
            'EEEE'
        );
        return  $fmt->format($this->dateOfService);
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLunch(): ?Lunch
    {
        return $this->lunch;
    }

    public function setLunch(?Lunch $lunch): self
    {
        $this->lunch = $lunch;

        return $this;
    }

    public function getDinner(): ?Dinner
    {
        return $this->dinner;
    }

    public function setDinner(?Dinner $dinner): self
    {
        $this->dinner = $dinner;

        return $this;
    }


}
