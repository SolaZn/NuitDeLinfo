<?php

namespace App\Entity;

use App\Repository\SauvetageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SauvetageRepository::class)
 */
class Sauvetage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DateSauvetage;

    /**
     * @ORM\ManyToOne(targetEntity=Bateau::class, inversedBy="sauvetages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bateau;

    /**
     * @ORM\ManyToOne(targetEntity=Equipage::class, inversedBy="sauvetages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipage;

    /**
     * @ORM\ManyToOne(targetEntity=sauve::class, inversedBy="sauvetages")
     */
    private $Sauve;

    public function __construct()
    {
        $this->Sauve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSauvetage(): ?\DateTimeInterface
    {
        return $this->DateSauvetage;
    }

    public function setDateSauvetage(\DateTimeInterface $DateSauvetage): self
    {
        $this->DateSauvetage = $DateSauvetage;

        return $this;
    }

    public function getBateau(): ?Bateau
    {
        return $this->Bateau;
    }

    public function setBateau(?Bateau $Bateau): self
    {
        $this->Bateau = $Bateau;

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

    /**
     * @return Collection|sauve[]
     */
    public function getSauve(): Collection
    {
        return $this->Sauve;
    }

    public function addSauve(sauve $sauve): self
    {
        if (!$this->Sauve->contains($sauve)) {
            $this->Sauve[] = $sauve;
        }

        return $this;
    }

    public function removeSauve(sauve $sauve): self
    {
        $this->Sauve->removeElement($sauve);

        return $this;
    }
}
