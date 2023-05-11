<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[Vich\Uploadable]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text', length: 255)]
    private $description;

    #[ORM\ManyToMany(targetEntity: Starter::class, mappedBy: 'category')]
    private $starters;

    #[ORM\ManyToMany(targetEntity: Dish::class, mappedBy: 'category')]
    private $dishes;

    #[ORM\ManyToMany(targetEntity: Dessert::class, mappedBy: 'category')]
    private $desserts;

    #[ORM\ManyToMany(targetEntity: Accompagnement::class, mappedBy: 'category')]
    private $accompagnements;

    #[ORM\ManyToMany(targetEntity: Laitier::class, mappedBy: 'category')]
    private $laitiers;

	// NOTE: This is not a mapped field of entity metadata, just a simple property.
	#[Vich\UploadableField(mapping: 'categoryIcons', fileNameProperty: 'imageName', size: 'imageSize')]
	private ?File $imageFile = null;

	#[ORM\Column(nullable: true)]
	private ?string $imageName = null;

	#[ORM\Column(nullable: true)]
	private ?int $imageSize = null;

	#[ORM\Column(nullable: true)]
	private ?\DateTimeImmutable $updatedAt = null;


    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->starters = new ArrayCollection();
        $this->dishes = new ArrayCollection();
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
            $starter->addCategory($this);
        }

        return $this;
    }

    public function removeStarter(Starter $starter): self
    {
        if ($this->starters->removeElement($starter)) {
            $starter->removeCategory($this);
        }

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
            $dish->addCategory($this);
        }

        return $this;
    }

    public function removeDish(Dish $dish): self
    {
        if ($this->dishes->removeElement($dish)) {
            $dish->removeCategory($this);
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
            $dessert->addCategory($this);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        if ($this->desserts->removeElement($dessert)) {
            $dessert->removeCategory($this);
        }

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
            $accompagnement->addCategory($this);
        }

        return $this;
    }

    public function removeAccompagnement(Accompagnement $accompagnement): self
    {
        if ($this->accompagnements->removeElement($accompagnement)) {
            $accompagnement->removeCategory($this);
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
            $laitier->addCategory($this);
        }

        return $this;
    }

    public function removeLaitier(Laitier $laitier): self
    {
        if ($this->laitiers->removeElement($laitier)) {
            $laitier->removeCategory($this);
        }

        return $this;
    }

	/**
	 * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
	 * of 'UploadedFile' is injected into this setter to trigger the update. If this
	 * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
	 * must be able to accept an instance of 'File' as the bundle will inject one here
	 * during Doctrine hydration.
	 *
	 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
	 */
	public function setImageFile(?File $imageFile = null): void
	{
		$this->imageFile = $imageFile;

		if (null !== $imageFile) {
			// It is required that at least one field changes if you are using doctrine
			// otherwise the event listeners won't be called and the file is lost
			$this->updatedAt = new \DateTimeImmutable();
		}
	}

	public function getImageFile(): ?File
	{
		return $this->imageFile;
	}

	public function setImageName(?string $imageName): void
	{
		$this->imageName = $imageName;
	}

	public function getImageName(): ?string
	{
		return $this->imageName;
	}

	public function setImageSize(?int $imageSize): void
	{
		$this->imageSize = $imageSize;
	}

	public function getImageSize(): ?int
	{
		return $this->imageSize;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description): void
	{
		$this->description = $description;
	}
}
