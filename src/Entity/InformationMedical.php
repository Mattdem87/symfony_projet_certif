<?php

namespace App\Entity;

use App\Repository\InformationMedicalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationMedicalRepository::class)
 */
class InformationMedical
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_securite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $traitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bilan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $medecin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $infirmiere;

    /**
     * @ORM\ManyToOne(targetEntity=patient::class, inversedBy="informationMedicals")
     */
    private $id_patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroSecurite(): ?int
    {
        return $this->numero_securite;
    }

    public function setNumeroSecurite(int $numero_securite): self
    {
        $this->numero_securite = $numero_securite;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): self
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(?string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    public function getMedecin(): ?string
    {
        return $this->medecin;
    }

    public function setMedecin(?string $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getInfirmiere(): ?string
    {
        return $this->infirmiere;
    }

    public function setInfirmiere(?string $infirmiere): self
    {
        $this->infirmiere = $infirmiere;

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
}
