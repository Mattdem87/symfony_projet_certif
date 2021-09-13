<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseRepository::class)
 */
class Adresse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rue;

    /**
     * @ORM\OneToMany(targetEntity=RepresentantLegal::class, mappedBy="adresse_id")
     */
    private $representantLegals;

    public function __construct()
    {
        $this->representantLegals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * @return Collection|RepresentantLegal[]
     */
    public function getRepresentantLegals(): Collection
    {
        return $this->representantLegals;
    }

    public function addRepresentantLegal(RepresentantLegal $representantLegal): self
    {
        if (!$this->representantLegals->contains($representantLegal)) {
            $this->representantLegals[] = $representantLegal;
            $representantLegal->setAdresseId($this);
        }

        return $this;
    }

    public function removeRepresentantLegal(RepresentantLegal $representantLegal): self
    {
        if ($this->representantLegals->removeElement($representantLegal)) {
            // set the owning side to null (unless already changed)
            if ($representantLegal->getAdresseId() === $this) {
                $representantLegal->setAdresseId(null);
            }
        }

        return $this;
    }
}
