<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenderRepository::class)]
class Gender
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

    #[ORM\OneToMany(mappedBy: 'gender', targetEntity: Employees::class)]
    private Collection $employees;

    #[ORM\OneToMany(mappedBy: 'gender', targetEntity: FamilyNucleus::class)]
    private Collection $familyNuclei;

    #[ORM\OneToMany(mappedBy: 'gender', targetEntity: PersonalReferences::class)]
    private Collection $personalReferences;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->familyNuclei = new ArrayCollection();
        $this->personalReferences = new ArrayCollection();
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
            $employee->setGender($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getGender() === $this) {
                $employee->setGender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FamilyNucleus>
     */
    public function getFamilyNuclei(): Collection
    {
        return $this->familyNuclei;
    }

    public function addFamilyNucleus(FamilyNucleus $familyNucleus): self
    {
        if (!$this->familyNuclei->contains($familyNucleus)) {
            $this->familyNuclei->add($familyNucleus);
            $familyNucleus->setGender($this);
        }

        return $this;
    }

    public function removeFamilyNucleus(FamilyNucleus $familyNucleus): self
    {
        if ($this->familyNuclei->removeElement($familyNucleus)) {
            // set the owning side to null (unless already changed)
            if ($familyNucleus->getGender() === $this) {
                $familyNucleus->setGender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PersonalReferences>
     */
    public function getPersonalReferences(): Collection
    {
        return $this->personalReferences;
    }

    public function addPersonalReference(PersonalReferences $personalReference): self
    {
        if (!$this->personalReferences->contains($personalReference)) {
            $this->personalReferences->add($personalReference);
            $personalReference->setGender($this);
        }

        return $this;
    }

    public function removePersonalReference(PersonalReferences $personalReference): self
    {
        if ($this->personalReferences->removeElement($personalReference)) {
            // set the owning side to null (unless already changed)
            if ($personalReference->getGender() === $this) {
                $personalReference->setGender(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return (string) $this->getName();
    }

}
