<?php

namespace App\Entity;

use App\Repository\FinancialProfileRepository;
use App\Util\TimeStampableEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinancialProfileRepository::class)]
class FinancialProfile
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $accounts = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $creditBalance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $creditCard = null;

    #[ORM\ManyToOne(inversedBy: 'financialProfiles')]
    private ?AccountType $accountType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isAccounts(): ?bool
    {
        return $this->accounts;
    }

    public function setAccounts(bool $accounts): self
    {
        $this->accounts = $accounts;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreditBalance(): ?string
    {
        return $this->creditBalance;
    }

    public function setCreditBalance(?string $creditBalance): self
    {
        $this->creditBalance = $creditBalance;

        return $this;
    }

    public function isCreditCard(): ?bool
    {
        return $this->creditCard;
    }

    public function setCreditCard(?bool $creditCard): self
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    public function getAccountType(): ?AccountType
    {
        return $this->accountType;
    }

    public function setAccountType(?AccountType $accountType): self
    {
        $this->accountType = $accountType;

        return $this;
    }
}
