<?php

namespace App\Entity;

use App\Repository\FreshSheetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FreshSheetRepository::class)
 */
class FreshSheet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="freshSheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userFreshSheet;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseSheetState::class, inversedBy="freshSheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $curriculumVitae;

    /**
     * @ORM\Column(type="datetime")
     */
    private $recordDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modificationDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserFreshSheet(): ?User
    {
        return $this->userFreshSheet;
    }

    public function setUserFreshSheet(?User $userFreshSheet): self
    {
        $this->userFreshSheet = $userFreshSheet;

        return $this;
    }

    public function getState(): ?ExpenseSheetState
    {
        return $this->state;
    }

    public function setState(?ExpenseSheetState $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(string $curriculumVitae): self
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }

    public function getRecordDate(): ?\DateTimeInterface
    {
        return $this->recordDate;
    }

    public function setRecordDate(\DateTimeInterface $recordDate): self
    {
        $this->recordDate = $recordDate;

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

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTimeInterface $modificationDate): self
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }
}
