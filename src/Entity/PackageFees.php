<?php

namespace App\Entity;

use App\Repository\PackageFeesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackageFeesRepository::class)
 */
class PackageFees
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
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\OneToMany(targetEntity=LineFeePackage::class, mappedBy="packageFees", orphanRemoval=true)
     */
    private $lineFeePackages;

    public function __construct()
    {
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

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

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
            $lineFeePackage->setPackageFees($this);
        }

        return $this;
    }

    public function removeLineFeePackage(LineFeePackage $lineFeePackage): self
    {
        if ($this->lineFeePackages->removeElement($lineFeePackage)) {
            // set the owning side to null (unless already changed)
            if ($lineFeePackage->getPackageFees() === $this) {
                $lineFeePackage->setPackageFees(null);
            }
        }

        return $this;
    }
}
