<?php

namespace App\Entity;

use App\Repository\EquipageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipageRepository::class)
 */
class Equipage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Sauveteur::class, mappedBy="Equipage")
     */
    private $Sauveteurs;

    /**
     * @ORM\OneToMany(targetEntity=Sauvetage::class, mappedBy="Equipage")
     */
    private $sauvetages;

    public function __construct()
    {
        $this->Sauveteurs = new ArrayCollection();
        $this->sauvetages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Sauveteur[]
     */
    public function getSauveteurs(): Collection
    {
        return $this->Sauveteurs;
    }

    public function addSauveteur(Sauveteur $sauveteur): self
    {
        if (!$this->Sauveteurs->contains($sauveteur)) {
            $this->Sauveteurs[] = $sauveteur;
            $sauveteur->setEquipage($this);
        }

        return $this;
    }

    public function removeSauveteur(Sauveteur $sauveteur): self
    {
        if ($this->Sauveteurs->removeElement($sauveteur)) {
            // set the owning side to null (unless already changed)
            if ($sauveteur->getEquipage() === $this) {
                $sauveteur->setEquipage(null);
            }
        }

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
            $sauvetage->setEquipage($this);
        }

        return $this;
    }

    public function removeSauvetage(Sauvetage $sauvetage): self
    {
        if ($this->sauvetages->removeElement($sauvetage)) {
            // set the owning side to null (unless already changed)
            if ($sauvetage->getEquipage() === $this) {
                $sauvetage->setEquipage(null);
            }
        }

        return $this;
    }
}
