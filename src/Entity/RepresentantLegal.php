<?php

namespace App\Entity;

use App\Repository\RepresentantLegalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepresentantLegalRepository::class)
 */
class RepresentantLegal
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
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="representantLegals")
     */
    private $id_patient;

    /**
     * @ORM\ManyToOne(targetEntity=Adresse::class, inversedBy="representantLegals")
     */
    private $adresse_id;

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

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getIdPatient(): ?patient
    {
        return $this->id_patient;
    }

    public function setIdPatient(?patient $id_patient): self
    {
        $this->id_patient = $id_patient;

        return $this;
    }

    public function getAdresseId(): ?adresse
    {
        return $this->adresse_id;
    }

    public function setAdresseId(?adresse $adresse_id): self
    {
        $this->adresse_id = $adresse_id;

        return $this;
    }
}
