<?php

namespace App\Entity;

use App\Repository\ExpenseSheetStateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpenseSheetStateRepository::class)
 */
class ExpenseSheetState
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
     * @ORM\OneToMany(targetEntity=FreshSheet::class, mappedBy="state", orphanRemoval=true)
     */
    private $freshSheets;

    public function __construct()
    {
        $this->freshSheets = new ArrayCollection();
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
     * @return Collection|FreshSheet[]
     */
    public function getFreshSheets(): Collection
    {
        return $this->freshSheets;
    }

    public function addFreshSheet(FreshSheet $freshSheet): self
    {
        if (!$this->freshSheets->contains($freshSheet)) {
            $this->freshSheets[] = $freshSheet;
            $freshSheet->setState($this);
        }

        return $this;
    }

    public function removeFreshSheet(FreshSheet $freshSheet): self
    {
        if ($this->freshSheets->removeElement($freshSheet)) {
            // set the owning side to null (unless already changed)
            if ($freshSheet->getState() === $this) {
                $freshSheet->setState(null);
            }
        }

        return $this;
    }
}
