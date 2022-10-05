<?php

namespace App\Entity;

use App\Repository\EducationLevelRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationLevelRepository::class)]
class EducationLevel
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'educationLevels')]
    private ?EducationLevelType $educationLevelType = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $institution = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: Employees::class, mappedBy: 'educationLevel')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEducationLevelType(): ?EducationLevelType
    {
        return $this->educationLevelType;
    }

    public function setEducationLevelType(?EducationLevelType $educationLevelType): self
    {
        $this->educationLevelType = $educationLevelType;

        return $this;
    }

    public function getInstitution(): ?string
    {
        return $this->institution;
    }

    public function setInstitution(?string $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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
            $employee->addEducationLevel($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            $employee->removeEducationLevel($this);
        }

        return $this;
    }
}
