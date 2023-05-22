<?php

namespace App\Entity;

use App\Repository\EnReductionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnReductionRepository::class)
 */
class EnReduction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=reduction::class, inversedBy="enreductions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reduction;

    /**
     * @ORM\ManyToOne(targetEntity=produit::class, inversedBy="enreductions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReduction(): ?reduction
    {
        return $this->reduction;
    }

    public function setReduction(?reduction $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getProduit(): ?produit
    {
        return $this->produit;
    }

    public function setProduit(?produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
