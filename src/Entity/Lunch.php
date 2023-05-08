<?php

namespace App\Entity;

use App\Repository\LunchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LunchRepository::class)]
class Lunch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'lunchOfTheDay', targetEntity: Day::class)]
    private $days;

    #[ORM\ManyToMany(targetEntity: Starter::class, inversedBy: 'lunches')]
    private $starters;

    #[ORM\ManyToMany(targetEntity: Dessert::class, inversedBy: 'lunches')]
    private $desserts;

    #[ORM\ManyToMany(targetEntity: Dish::class, inversedBy: 'lunches')]
    private $dishes;

    #[ORM\ManyToMany(targetEntity: Accompagnement::class, inversedBy: 'lunches')]
    private $accompagnements;

    #[ORM\ManyToMany(targetEntity: Laitier::class, inversedBy: 'lunches')]
    private $laitiers;



    public function __toString()
    {
        return "Déjeuner";
    }

    public function __construct()
    {
        $this->days = new ArrayCollection();
        $this->starters = new ArrayCollection();
        $this->desserts = new ArrayCollection();
        $this->dishes = new ArrayCollection();
        $this->accompagnements = new ArrayCollection();
        $this->laitiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $day->setLunchOfTheDay($this);
        }

        return $this;
    }

    public function removeDay(Day $day): self
    {
        if ($this->days->removeElement($day)) {
            // set the owning side to null (unless already changed)
            if ($day->getLunchOfTheDay() === $this) {
                $day->setLunchOfTheDay(null);
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
     * @return Collection|Accompagnement[]
     */
    public function getAccompagnements(): Collection
    {
        return $this->accompagnements;
    }

    public function addAccompagnement(Accompagnement $accompagnement): self
    {
        if (!$this->accompagnements->contains($accompagnement)) {
            $this->accompagnements[] = $accompagnement;
        }

        return $this;
    }

    public function removeAccompagnement(Accompagnement $accompagnement): self
    {
        $this->accompagnements->removeElement($accompagnement);

        return $this;
    }

    /**
     * @return Collection|Laitier[]
     */
    public function getLaitiers(): Collection
    {
        return $this->laitiers;
    }

    public function addLaitier(Laitier $laitier): self
    {
        if (!$this->laitiers->contains($laitier)) {
            $this->laitiers[] = $laitier;
        }

        return $this;
    }

    public function removeLaitier(Laitier $laitier): self
    {
        $this->laitiers->removeElement($laitier);

        return $this;
    }
}
