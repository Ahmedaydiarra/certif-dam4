<?php

namespace App\Entity;

use App\Repository\MagasinRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MagasinRepository::class)
 */
class Magasin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_magasin;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $adresse_magasin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ville_magasin;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMagasin(): ?string
    {
        return $this->nom_magasin;
    }

    public function setNomMagasin(string $nom_magasin): self
    {
        $this->nom_magasin = $nom_magasin;

        return $this;
    }

    public function getAdresseMagasin(): ?string
    {
        return $this->adresse_magasin;
    }

    public function setAdresseMagasin(string $adresse_magasin): self
    {
        $this->adresse_magasin = $adresse_magasin;

        return $this;
    }

    public function getVilleMagasin(): ?string
    {
        return $this->ville_magasin;
    }

    public function setVilleMagasin(string $ville_magasin): self
    {
        $this->ville_magasin = $ville_magasin;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
}
