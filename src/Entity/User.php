<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postalCode;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hireDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $registrationNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=FreshSheet::class, mappedBy="userFreshSheet", orphanRemoval=true)
     */
    private $freshSheets;

    /**
     * @ORM\OneToMany(targetEntity=Messaging::class, mappedBy="mailUser", orphanRemoval=true)
     */
    private $messagings;

    /**
     * @ORM\OneToMany(targetEntity=Justificative::class, mappedBy="supportUser", orphanRemoval=true)
     */
    private $justificatives;

    /**
     * @ORM\OneToMany(targetEntity=LineChargesOutsideTheBundle::class, mappedBy="userLineChargesOutsideTheBundle", orphanRemoval=true)
     */
    private $lineChargesOutsideTheBundles;

    /**
     * @ORM\OneToMany(targetEntity=LineFeePackage::class, mappedBy="feesPackageUser", orphanRemoval=true)
     */
    private $lineFeePackages;

    public function __construct()
    {
        $this->freshSheets = new ArrayCollection();
        $this->messagings = new ArrayCollection();
        $this->justificatives = new ArrayCollection();
        $this->lineChargesOutsideTheBundles = new ArrayCollection();
        $this->lineFeePackages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getHireDate(): ?string
    {
        return $this->hireDate;
    }

    public function setHireDate(string $hireDate): self
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registrationNumber;
    }

    public function setRegistrationNumber(string $registrationNumber): self
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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
            $freshSheet->setUserFreshSheet($this);
        }

        return $this;
    }

    public function removeFreshSheet(FreshSheet $freshSheet): self
    {
        if ($this->freshSheets->removeElement($freshSheet)) {
            // set the owning side to null (unless already changed)
            if ($freshSheet->getUserFreshSheet() === $this) {
                $freshSheet->setUserFreshSheet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Messaging[]
     */
    public function getMessagings(): Collection
    {
        return $this->messagings;
    }

    public function addMessaging(Messaging $messaging): self
    {
        if (!$this->messagings->contains($messaging)) {
            $this->messagings[] = $messaging;
            $messaging->setMailUser($this);
        }

        return $this;
    }

    public function removeMessaging(Messaging $messaging): self
    {
        if ($this->messagings->removeElement($messaging)) {
            // set the owning side to null (unless already changed)
            if ($messaging->getMailUser() === $this) {
                $messaging->setMailUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Justificative[]
     */
    public function getJustificatives(): Collection
    {
        return $this->justificatives;
    }

    public function addJustificative(Justificative $justificative): self
    {
        if (!$this->justificatives->contains($justificative)) {
            $this->justificatives[] = $justificative;
            $justificative->setSupportUser($this);
        }

        return $this;
    }

    public function removeJustificative(Justificative $justificative): self
    {
        if ($this->justificatives->removeElement($justificative)) {
            // set the owning side to null (unless already changed)
            if ($justificative->getSupportUser() === $this) {
                $justificative->setSupportUser(null);
            }
        }

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
            $lineChargesOutsideTheBundle->setUserLineChargesOutsideTheBundle($this);
        }

        return $this;
    }

    public function removeLineChargesOutsideTheBundle(LineChargesOutsideTheBundle $lineChargesOutsideTheBundle): self
    {
        if ($this->lineChargesOutsideTheBundles->removeElement($lineChargesOutsideTheBundle)) {
            // set the owning side to null (unless already changed)
            if ($lineChargesOutsideTheBundle->getUserLineChargesOutsideTheBundle() === $this) {
                $lineChargesOutsideTheBundle->setUserLineChargesOutsideTheBundle(null);
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
            $lineFeePackage->setFeesPackageUser($this);
        }

        return $this;
    }

    public function removeLineFeePackage(LineFeePackage $lineFeePackage): self
    {
        if ($this->lineFeePackages->removeElement($lineFeePackage)) {
            // set the owning side to null (unless already changed)
            if ($lineFeePackage->getFeesPackageUser() === $this) {
                $lineFeePackage->setFeesPackageUser(null);
            }
        }

        return $this;
    }
}
