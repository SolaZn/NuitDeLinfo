<?php

namespace App\Entity;

use App\Repository\SauveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SauveRepository::class)
 */
class Sauve
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
     * @ORM\ManyToMany(targetEntity=Sauvetage::class, mappedBy="Sauve")
     */
    private $sauvetages;

    public function __construct()
    {
        $this->sauvetages = new ArrayCollection();
    }

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

    /**
     * @return Collection|Sauvetage[]
     */
    public function getSauvetages(): Collection
    {
        return $this->sauvetages;
    }

    public function addSauvetage(Sauvetage $sauvetage): self
    {
        if (!$this->sauvetages->contains($sauvetage)) {
            $this->sauvetages[] = $sauvetage;
            $sauvetage->addSauve($this);
        }

        return $this;
    }

    public function removeSauvetage(Sauvetage $sauvetage): self
    {
        if ($this->sauvetages->removeElement($sauvetage)) {
            $sauvetage->removeSauve($this);
        }

        return $this;
    }
}
