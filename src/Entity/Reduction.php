<?php

namespace App\Entity;

use App\Repository\ReductionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReductionRepository::class)
 */
class Reduction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $pourcentage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_modification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_suppression;

    /**
     * @ORM\OneToMany(targetEntity=Enreduction::class, mappedBy="reduction", orphanRemoval=true)
     */
    private $enreductions;

    public function __construct()
    {
        $this->enreductions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    public function setPourcentage(float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->date_modification;
    }

    public function setDateModification(\DateTimeInterface $date_modification): self
    {
        $this->date_modification = $date_modification;

        return $this;
    }

    public function getDateSuppression(): ?\DateTimeInterface
    {
        return $this->date_suppression;
    }

    public function setDateSuppression(\DateTimeInterface $date_suppression): self
    {
        $this->date_suppression = $date_suppression;

        return $this;
    }

    /**
     * @return Collection<int, Enreduction>
     */
    public function getEnreductions(): Collection
    {
        return $this->enreductions;
    }

    public function addEnreduction(Enreduction $enreduction): self
    {
        if (!$this->enreductions->contains($enreduction)) {
            $this->enreductions[] = $enreduction;
            $enreduction->setReduction($this);
        }

        return $this;
    }

    public function removeEnreduction(Enreduction $enreduction): self
    {
        if ($this->enreductions->removeElement($enreduction)) {
            // set the owning side to null (unless already changed)
            if ($enreduction->getReduction() === $this) {
                $enreduction->setReduction(null);
            }
        }

        return $this;
    }
}
