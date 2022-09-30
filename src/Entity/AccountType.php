<?php

namespace App\Entity;

use App\Repository\AccountTypeRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountTypeRepository::class)]
class AccountType
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\OneToMany(mappedBy: 'accountType', targetEntity: FinancialProfile::class)]
    private Collection $financialProfiles;

    public function __construct()
    {
        $this->financialProfiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, FinancialProfile>
     */
    public function getFinancialProfiles(): Collection
    {
        return $this->financialProfiles;
    }

    public function addFinancialProfile(FinancialProfile $financialProfile): self
    {
        if (!$this->financialProfiles->contains($financialProfile)) {
            $this->financialProfiles->add($financialProfile);
            $financialProfile->setAccountType($this);
        }

        return $this;
    }

    public function removeFinancialProfile(FinancialProfile $financialProfile): self
    {
        if ($this->financialProfiles->removeElement($financialProfile)) {
            // set the owning side to null (unless already changed)
            if ($financialProfile->getAccountType() === $this) {
                $financialProfile->setAccountType(null);
            }
        }

        return $this;
    }
}
