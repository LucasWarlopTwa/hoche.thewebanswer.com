<?php

namespace App\Entity;

use App\Repository\DishTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DishTypeRepository::class)]
class DishType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Dish::class)]
    private $dishes;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $codeCouleur;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Starter::class)]
    private $starters;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Dish::class)]
    private $dishesbytype;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Dessert::class)]
    private $desserts;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Accompagnement::class)]
    private $accompagnements;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Laitier::class)]
    private $laitiers;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;



    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->dishes = new ArrayCollection();
        $this->starters = new ArrayCollection();
        $this->dishesbytype = new ArrayCollection();
        $this->desserts = new ArrayCollection();
        $this->accompagnements = new ArrayCollection();
        $this->laitiers = new ArrayCollection();
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
            $dish->setType($this);
        }

        return $this;
    }

    public function removeDish(Dish $dish): self
    {
        if ($this->dishes->removeElement($dish)) {
            // set the owning side to null (unless already changed)
            if ($dish->getType() === $this) {
                $dish->setType(null);
            }
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCodeCouleur(): ?string
    {
        return $this->codeCouleur;
    }

    public function setCodeCouleur(string $codeCouleur): self
    {
        $this->codeCouleur = $codeCouleur;

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
            $starter->setType($this);
        }

        return $this;
    }

    public function removeStarter(Starter $starter): self
    {
        if ($this->starters->removeElement($starter)) {
            // set the owning side to null (unless already changed)
            if ($starter->getType() === $this) {
                $starter->setType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dish[]
     */
    public function getDishesbytype(): Collection
    {
        return $this->dishesbytype;
    }

    public function addDishesbytype(Dish $dishesbytype): self
    {
        if (!$this->dishesbytype->contains($dishesbytype)) {
            $this->dishesbytype[] = $dishesbytype;
            $dishesbytype->setType($this);
        }

        return $this;
    }

    public function removeDishesbytype(Dish $dishesbytype): self
    {
        if ($this->dishesbytype->removeElement($dishesbytype)) {
            // set the owning side to null (unless already changed)
            if ($dishesbytype->getType() === $this) {
                $dishesbytype->setType(null);
            }
        }

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
            $dessert->setType($this);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        if ($this->desserts->removeElement($dessert)) {
            // set the owning side to null (unless already changed)
            if ($dessert->getType() === $this) {
                $dessert->setType(null);
            }
        }

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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
            $accompagnement->setType($this);
        }

        return $this;
    }

    public function removeAccompagnement(Accompagnement $accompagnement): self
    {
        if ($this->accompagnements->removeElement($accompagnement)) {
            // set the owning side to null (unless already changed)
            if ($accompagnement->getType() === $this) {
                $accompagnement->setType(null);
            }
        }

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
            $laitier->setType($this);
        }

        return $this;
    }

    public function removeLaitier(Laitier $laitier): self
    {
        if ($this->laitiers->removeElement($laitier)) {
            // set the owning side to null (unless already changed)
            if ($laitier->getType() === $this) {
                $laitier->setType(null);
            }
        }

        return $this;
    }
}
