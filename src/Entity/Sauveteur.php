<?php

namespace App\Entity;

use App\Repository\SauveteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SauveteurRepository::class)
 */
class Sauveteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDeces;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateNaiss;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=Equipage::class, inversedBy="Sauveteurs")
     */
    private $Equipage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateDeces(): ?\DateTimeInterface
    {
        return $this->DateDeces;
    }

    public function setDateDeces(?\DateTimeInterface $DateDeces): self
    {
        $this->DateDeces = $DateDeces;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->DateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $DateNaiss): self
    {
        $this->DateNaiss = $DateNaiss;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getEquipage(): ?Equipage
    {
        return $this->Equipage;
    }

    public function setEquipage(?Equipage $Equipage): self
    {
        $this->Equipage = $Equipage;

        return $this;
    }
}
