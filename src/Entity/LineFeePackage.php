<?php

namespace App\Entity;

use App\Repository\LineFeePackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineFeePackageRepository::class)
 */
class LineFeePackage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=LineStatus::class, inversedBy="lineFeePackages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lineStatus;

    /**
     * @ORM\ManyToMany(targetEntity=Justificative::class, inversedBy="lineFeePackages")
     */
    private $justificative;

    /**
     * @ORM\ManyToOne(targetEntity=PackageFees::class, inversedBy="lineFeePackages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $packageFees;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lineFeePackages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $feesPackageUser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLineFresh;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDate;

    public function __construct()
    {
        $this->justificative = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLineStatus(): ?LineStatus
    {
        return $this->lineStatus;
    }

    public function setLineStatus(?LineStatus $lineStatus): self
    {
        $this->lineStatus = $lineStatus;

        return $this;
    }

    /**
     * @return Collection|Justificative[]
     */
    public function getJustificative(): Collection
    {
        return $this->justificative;
    }

    public function addJustificative(Justificative $justificative): self
    {
        if (!$this->justificative->contains($justificative)) {
            $this->justificative[] = $justificative;
        }

        return $this;
    }

    public function removeJustificative(Justificative $justificative): self
    {
        $this->justificative->removeElement($justificative);

        return $this;
    }

    public function getPackageFees(): ?PackageFees
    {
        return $this->packageFees;
    }

    public function setPackageFees(?PackageFees $packageFees): self
    {
        $this->packageFees = $packageFees;

        return $this;
    }

    public function getFeesPackageUser(): ?User
    {
        return $this->feesPackageUser;
    }

    public function setFeesPackageUser(?User $feesPackageUser): self
    {
        $this->feesPackageUser = $feesPackageUser;

        return $this;
    }

    public function getDateLineFresh(): ?\DateTimeInterface
    {
        return $this->dateLineFresh;
    }

    public function setDateLineFresh(\DateTimeInterface $dateLineFresh): self
    {
        $this->dateLineFresh = $dateLineFresh;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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
}
