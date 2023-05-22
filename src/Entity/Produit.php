<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $etat_produit;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $couleur;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $disponibilite;

    /**
     * @ORM\ManyToOne(targetEntity=categorie::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=magasin::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $magasin;

    /**
     * @ORM\OneToMany(targetEntity=Imageproduit::class, mappedBy="produit", orphanRemoval=true)
     */
    private $imageproduits;

    /**
     * @ORM\OneToMany(targetEntity=Enreduction::class, mappedBy="produit", orphanRemoval=true)
     */
    private $enreductions;

    /**
     * @ORM\ManyToMany(targetEntity=Commande::class, mappedBy="produit")
     */
    private $commandes;

    public function __construct()
    {
        $this->imageproduits = new ArrayCollection();
        $this->enreductions = new ArrayCollection();
        $this->commandes = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function getEtatProduit(): ?string
    {
        return $this->etat_produit;
    }

    public function setEtatProduit(string $etat_produit): self
    {
        $this->etat_produit = $etat_produit;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(int $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getMagasin(): ?magasin
    {
        return $this->magasin;
    }

    public function setMagasin(?magasin $magasin): self
    {
        $this->magasin = $magasin;

        return $this;
    }

    /**
     * @return Collection<int, Imageproduit>
     */
    public function getImageproduits(): Collection
    {
        return $this->imageproduits;
    }

    public function addImageproduit(Imageproduit $imageproduit): self
    {
        if (!$this->imageproduits->contains($imageproduit)) {
            $this->imageproduits[] = $imageproduit;
            $imageproduit->setProduit($this);
        }

        return $this;
    }

    public function removeImageproduit(Imageproduit $imageproduit): self
    {
        if ($this->imageproduits->removeElement($imageproduit)) {
            // set the owning side to null (unless already changed)
            if ($imageproduit->getProduit() === $this) {
                $imageproduit->setProduit(null);
            }
        }

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
            $enreduction->setProduit($this);
        }

        return $this;
    }

    public function removeEnreduction(Enreduction $enreduction): self
    {
        if ($this->enreductions->removeElement($enreduction)) {
            // set the owning side to null (unless already changed)
            if ($enreduction->getProduit() === $this) {
                $enreduction->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->addProduit($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            $commande->removeProduit($this);
        }

        return $this;
    }
}
