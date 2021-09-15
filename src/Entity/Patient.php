<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PatientRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=RepresentantLegal::class, mappedBy="id_patient")
     */
    private $representantLegals;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="id_patient")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=InformationMedical::class, mappedBy="id_patient")
     */
    private $informationMedicals;

    public function __construct()
    {
        $this->representantLegals = new ArrayCollection();
        $this->informationMedicals = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?string
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(string $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieu_de_naissance;
    }

    public function setLieuDeNaissance(string $lieu_de_naissance): self
    {
        $this->lieu_de_naissance = $lieu_de_naissance;

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
            $representantLegal->setIdPatient($this);
        }

        return $this;
    }

    public function removeRepresentantLegal(RepresentantLegal $representantLegal): self
    {
        if ($this->representantLegals->removeElement($representantLegal)) {
            // set the owning side to null (unless already changed)
            if ($representantLegal->getIdPatient() === $this) {
                $representantLegal->setIdPatient(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|InformationMedical[]
     */
    public function getInformationMedicals(): Collection
    {
        return $this->informationMedicals;
    }

    public function addInformationMedical(InformationMedical $informationMedical): self
    {
        if (!$this->informationMedicals->contains($informationMedical)) {
            $this->informationMedicals[] = $informationMedical;
            $informationMedical->setIdPatient($this);
        }

        return $this;
    }

    public function removeInformationMedical(InformationMedical $informationMedical): self
    {
        if ($this->informationMedicals->removeElement($informationMedical)) {
            // set the owning side to null (unless already changed)
            if ($informationMedical->getIdPatient() === $this) {
                $informationMedical->setIdPatient(null);
            }
        }

        return $this;
    }
}
