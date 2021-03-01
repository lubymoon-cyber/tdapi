<?php

namespace App\Entity;

use App\Repository\MessagingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagingRepository::class)
 */
class Messaging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messagings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mailUser;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messagings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destinationUser;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="messagings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $senderUser;

    /**
     * @ORM\Column(type="boolean")
     */
    private $state;

    /**
     * @ORM\Column(type="boolean")
     */
    private $archives;

    /**
     * @ORM\Column(type="object")
     */
    private $object;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $messageDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMailUser(): ?User
    {
        return $this->mailUser;
    }

    public function setMailUser(?User $mailUser): self
    {
        $this->mailUser = $mailUser;

        return $this;
    }

    public function getDestinationUser(): ?User
    {
        return $this->destinationUser;
    }

    public function setDestinationUser(?User $destinationUser): self
    {
        $this->destinationUser = $destinationUser;

        return $this;
    }

    public function getSenderUser(): ?User
    {
        return $this->senderUser;
    }

    public function setSenderUser(?User $senderUser): self
    {
        $this->senderUser = $senderUser;

        return $this;
    }

    public function getState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getArchives(): ?bool
    {
        return $this->archives;
    }

    public function setArchives(bool $archives): self
    {
        $this->archives = $archives;

        return $this;
    }

    public function getObject()
    {
        return $this->object;
    }

    public function setObject($object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getMessageDate(): ?\DateTimeInterface
    {
        return $this->messageDate;
    }

    public function setMessageDate(\DateTimeInterface $messageDate): self
    {
        $this->messageDate = $messageDate;

        return $this;
    }
}
