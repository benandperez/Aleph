<?php

namespace App\Entity;

use App\Repository\DocumentTypeRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentTypeRepository::class)]
class DocumentType
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

    #[ORM\OneToMany(mappedBy: 'documentType', targetEntity: Employees::class)]
    private Collection $employees;

    #[ORM\OneToMany(mappedBy: 'documentType', targetEntity: FamilyNucleus::class)]
    private Collection $familyNuclei;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->familyNuclei = new ArrayCollection();
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
            $employee->setDocumentType($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getDocumentType() === $this) {
                $employee->setDocumentType(null);
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
            $familyNucleus->setDocumentType($this);
        }

        return $this;
    }

    public function removeFamilyNucleus(FamilyNucleus $familyNucleus): self
    {
        if ($this->familyNuclei->removeElement($familyNucleus)) {
            // set the owning side to null (unless already changed)
            if ($familyNucleus->getDocumentType() === $this) {
                $familyNucleus->setDocumentType(null);
            }
        }

        return $this;
    }
}
