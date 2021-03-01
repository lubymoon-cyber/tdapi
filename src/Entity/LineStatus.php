<?php

namespace App\Entity;

use App\Repository\LineStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineStatusRepository::class)
 */
class LineStatus
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
    private $wording;

    /**
     * @ORM\OneToMany(targetEntity=LineChargesOutsideTheBundle::class, mappedBy="lineStatus", orphanRemoval=true)
     */
    private $lineChargesOutsideTheBundles;

    /**
     * @ORM\OneToMany(targetEntity=LineFeePackage::class, mappedBy="lineStatus", orphanRemoval=true)
     */
    private $lineFeePackages;

    public function __construct()
    {
        $this->lineChargesOutsideTheBundles = new ArrayCollection();
        $this->lineFeePackages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

        return $this;
    }

    /**
     * @return Collection|LineChargesOutsideTheBundle[]
     */
    public function getLineChargesOutsideTheBundles(): Collection
    {
        return $this->lineChargesOutsideTheBundles;
    }

    public function addLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if (!$this->lineChargesOutsideTheBundles->contains($lineChargesOutsideTheBundle)) {
            $this->lineChargesOutsideTheBundles[] = $lineChargesOutsideTheBundle;
            $lineChargesOutsideTheBundle->setLineStatus($this);
        }

        return $this;
    }

    public function removeLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if ($this->lineChargesOutsideTheBundles->removeElement($lineChargesOutsideTheBundle)) {
            // set the owning side to null (unless already changed)
            if ($lineChargesOutsideTheBundle->getLineStatus() === $this) {
                $lineChargesOutsideTheBundle->setLineStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LineFeePackage[]
     */
    public function getLineFeePackages(): Collection
    {
        return $this->lineFeePackages;
    }

    public function addLineFeePackage(LineFeePackage $lineFeePackage): self
    {
        if (!$this->lineFeePackages->contains($lineFeePackage)) {
            $this->lineFeePackages[] = $lineFeePackage;
            $lineFeePackage->setLineStatus($this);
        }

        return $this;
    }

    public function removeLineFeePackage(LineFeePackage $lineFeePackage): self
    {
        if ($this->lineFeePackages->removeElement($lineFeePackage)) {
            // set the owning side to null (unless already changed)
            if ($lineFeePackage->getLineStatus() === $this) {
                $lineFeePackage->setLineStatus(null);
            }
        }

        return $this;
    }
}
