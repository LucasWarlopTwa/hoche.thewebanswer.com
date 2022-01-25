<?php

namespace App\Entity;

use App\Repository\DinnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DinnerRepository::class)]
class Dinner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'dinnerOfTheDay', targetEntity: Day::class)]
    private $days;

    #[ORM\ManyToMany(targetEntity: Starter::class, inversedBy: 'dinners')]
    private $starters;

    #[ORM\ManyToMany(targetEntity: Dish::class, inversedBy: 'dinners')]
    private $dishes;

    #[ORM\ManyToMany(targetEntity: Dessert::class, inversedBy: 'dinners')]
    private $desserts;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->days = new ArrayCollection();
        $this->starters = new ArrayCollection();
        $this->dishes = new ArrayCollection();
        $this->desserts = new ArrayCollection();
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

    /**
     * @return Collection|Day[]
     */
    public function getDays(): Collection
    {
        return $this->days;
    }

    public function addDay(Day $day): self
    {
        if (!$this->days->contains($day)) {
            $this->days[] = $day;
            $day->setDinnerOfTheDay($this);
        }

        return $this;
    }

    public function removeDay(Day $day): self
    {
        if ($this->days->removeElement($day)) {
            // set the owning side to null (unless already changed)
            if ($day->getDinnerOfTheDay() === $this) {
                $day->setDinnerOfTheDay(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Starter[]
     */
    public function getStarters(): Collection
    {
        return $this->starters;
    }

    public function addStarter(Starter $starter): self
    {
        if (!$this->starters->contains($starter)) {
            $this->starters[] = $starter;
        }

        return $this;
    }

    public function removeStarter(Starter $starter): self
    {
        $this->starters->removeElement($starter);

        return $this;
    }

    /**
     * @return Collection|Dish[]
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dish $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes[] = $dish;
        }

        return $this;
    }

    public function removeDish(Dish $dish): self
    {
        $this->dishes->removeElement($dish);

        return $this;
    }

    /**
     * @return Collection|Dessert[]
     */
    public function getDesserts(): Collection
    {
        return $this->desserts;
    }

    public function addDessert(Dessert $dessert): self
    {
        if (!$this->desserts->contains($dessert)) {
            $this->desserts[] = $dessert;
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        $this->desserts->removeElement($dessert);

        return $this;
    }
}
