<?php

namespace App\Entity;

use App\Repository\StarterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarterRepository::class)]
class Starter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToMany(targetEntity: Lunch::class, mappedBy: 'starters')]
    private $lunches;

    #[ORM\ManyToMany(targetEntity: Dinner::class, mappedBy: 'starters')]
    private $dinners;

    #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'starters')]
    private $category;

    #[ORM\ManyToOne(targetEntity: DishType::class, inversedBy: 'starters')]
    private $type;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->lunches = new ArrayCollection();
        $this->dinners = new ArrayCollection();
        $this->category = new ArrayCollection();
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
     * @return Collection|Lunch[]
     */
    public function getLunches(): Collection
    {
        return $this->lunches;
    }

    public function addLunch(Lunch $lunch): self
    {
        if (!$this->lunches->contains($lunch)) {
            $this->lunches[] = $lunch;
            $lunch->addStarter($this);
        }

        return $this;
    }

    public function removeLunch(Lunch $lunch): self
    {
        if ($this->lunches->removeElement($lunch)) {
            $lunch->removeStarter($this);
        }

        return $this;
    }

    /**
     * @return Collection|Dinner[]
     */
    public function getDinners(): Collection
    {
        return $this->dinners;
    }

    public function addDinner(Dinner $dinner): self
    {
        if (!$this->dinners->contains($dinner)) {
            $this->dinners[] = $dinner;
            $dinner->addStarter($this);
        }

        return $this;
    }

    public function removeDinner(Dinner $dinner): self
    {
        if ($this->dinners->removeElement($dinner)) {
            $dinner->removeStarter($this);
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    public function getType(): ?DishType
    {
        return $this->type;
    }

    public function setType(?DishType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
