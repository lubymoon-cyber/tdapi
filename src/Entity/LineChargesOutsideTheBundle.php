<?php

namespace App\Entity;

use App\Repository\LineChargesOutsideTheBundleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LineChargesOutsideTheBundleRepository::class)
 */
class LineChargesOutsideTheBundle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=LineStatus::class, inversedBy="lineChargesOutsideTheBundles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lineStatus;

    /**
     * @ORM\ManyToMany(targetEntity=Justificative::class, inversedBy="lineChargesOutsideTheBundles")
     */
    private $justificative;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lineChargesOutsideTheBundles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userLineChargesOutsideTheBundle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $outOfClassification;

    /**
     * @ORM\Column(type="datetime")
     */
    private $freshLineDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wording;

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

    public function getUserLineChargesOutsideTheBundle(): ?User
    {
        return $this->userLineChargesOutsideTheBundle;
    }

    public function setUserLineChargesOutsideTheBundle(?User $userLineChargesOutsideTheBundle): self
    {
        $this->userLineChargesOutsideTheBundle = $userLineChargesOutsideTheBundle;

        return $this;
    }

    public function getOutOfClassification(): ?bool
    {
        return $this->outOfClassification;
    }

    public function setOutOfClassification(bool $outOfClassification): self
    {
        $this->outOfClassification = $outOfClassification;

        return $this;
    }

    public function getFreshLineDate(): ?\DateTimeInterface
    {
        return $this->freshLineDate;
    }

    public function setFreshLineDate(\DateTimeInterface $freshLineDate): self
    {
        $this->freshLineDate = $freshLineDate;

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

    public function getWording(): ?string
    {
        return $this->wording;
    }

    public function setWording(string $wording): self
    {
        $this->wording = $wording;

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
