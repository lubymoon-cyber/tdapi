<?php

namespace App\Entity;

use App\Repository\JustificativeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JustificativeRepository::class)
 */
class Justificative
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="justificatives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $supportUser;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateProduction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\ManyToMany(targetEntity=LineChargesOutsideTheBundle::class, mappedBy="justificative")
     */
    private $lineChargesOutsideTheBundles;

    /**
     * @ORM\ManyToMany(targetEntity=LineFeePackage::class, mappedBy="justificative")
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

    public function getSupportUser(): ?User
    {
        return $this->supportUser;
    }

    public function setSupportUser(?User $supportUser): self
    {
        $this->supportUser = $supportUser;

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

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getDateProduction(): ?\DateTimeInterface
    {
        return $this->dateProduction;
    }

    public function setDateProduction(\DateTimeInterface $dateProduction): self
    {
        $this->dateProduction = $dateProduction;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

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
            $lineChargesOutsideTheBundle->addJustificative($this);
        }

        return $this;
    }

    public function removeLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if ($this->lineChargesOutsideTheBundles->removeElement($lineChargesOutsideTheBundle)) {
            $lineChargesOutsideTheBundle->removeJustificative($this);
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
            $lineFeePackage->addJustificative($this);
        }

        return $this;
    }

    public function removeLineFeePackage(LineFeePackage $lineFeePackage): self
    {
        if ($this->lineFeePackages->removeElement($lineFeePackage)) {
            $lineFeePackage->removeJustificative($this);
        }

        return $this;
    }
}
