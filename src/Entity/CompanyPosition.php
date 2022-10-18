<?php

namespace App\Entity;

use App\Repository\CompanyPositionRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyPositionRepository::class)]
class CompanyPosition
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\OneToMany(mappedBy: 'companyPosition', targetEntity: Employees::class)]
    private Collection $employees;

    #[ORM\OneToMany(mappedBy: 'companyPosition', targetEntity: LaborInformationAlephGroup::class)]
    private Collection $laborInformationAlephGroups;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->laborInformationAlephGroups = new ArrayCollection();
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
     * @return Collection<int, Employees>
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employees $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees->add($employee);
            $employee->setCompanyPosition($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getCompanyPosition() === $this) {
                $employee->setCompanyPosition(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return Collection<int, LaborInformationAlephGroup>
     */
    public function getLaborInformationAlephGroups(): Collection
    {
        return $this->laborInformationAlephGroups;
    }

    public function addLaborInformationAlephGroup(LaborInformationAlephGroup $laborInformationAlephGroup): self
    {
        if (!$this->laborInformationAlephGroups->contains($laborInformationAlephGroup)) {
            $this->laborInformationAlephGroups->add($laborInformationAlephGroup);
            $laborInformationAlephGroup->setCompanyPosition($this);
        }

        return $this;
    }

    public function removeLaborInformationAlephGroup(LaborInformationAlephGroup $laborInformationAlephGroup): self
    {
        if ($this->laborInformationAlephGroups->removeElement($laborInformationAlephGroup)) {
            // set the owning side to null (unless already changed)
            if ($laborInformationAlephGroup->getCompanyPosition() === $this) {
                $laborInformationAlephGroup->setCompanyPosition(null);
            }
        }

        return $this;
    }
}
