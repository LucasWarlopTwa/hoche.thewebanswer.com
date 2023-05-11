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

    #[ORM\OneToOne(mappedBy: 'lunch', cascade: ['persist', 'remove'])]
    private ?Day $day = null;



	public function __toString()
	{
		// Assurez-vous que getDay() renvoie une instance de DateTime
		$day = $this->getDay();

		// Vous pouvez vérifier si $day est une instance de DateTime avant de l'utiliser
		if ($day instanceof \DateTime) {
			// Formattez la date en une chaîne de caractères. Ici, nous utilisons le format 'd-m-Y',
			// mais vous pouvez le changer en fonction de vos besoins.
			return 'Déjeuner du ' . $day->format('d-m-Y');
		} else {
			// Si $day n'est pas une instance de DateTime, vous pouvez retourner une chaîne de caractères vide,
			// ou une autre valeur par défaut de votre choix.
			return 'N/A';
		}
	}

    public function __construct()
    {
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

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): self
    {
        // unset the owning side of the relation if necessary
        if ($day === null && $this->day !== null) {
            $this->day->setLunch(null);
        }

        // set the owning side of the relation if necessary
        if ($day !== null && $day->getLunch() !== $this) {
            $day->setLunch($this);
        }

        $this->day = $day;

        return $this;
    }
}
