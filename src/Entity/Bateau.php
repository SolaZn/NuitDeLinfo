<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BateauRepository::class)
 */
class Bateau
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
    private $Nom;

    /**
     * @ORM\OneToMany(targetEntity=Sauvetage::class, mappedBy="Bateau")
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

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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
            $sauvetage->setBateau($this);
        }

        return $this;
    }

    public function removeSauvetage(Sauvetage $sauvetage): self
    {
        if ($this->sauvetages->removeElement($sauvetage)) {
            // set the owning side to null (unless already changed)
            if ($sauvetage->getBateau() === $this) {
                $sauvetage->setBateau(null);
            }
        }

        return $this;
    }
}
