<?php

namespace App\Entity;

use App\Repository\LaborInformationAlephGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LaborInformationAlephGroupRepository::class)]
class LaborInformationAlephGroup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'laborInformationAlephGroups')]
    private ?EmployeeType $employeeType = null;

    #[ORM\ManyToOne(inversedBy: 'laborInformationAlephGroups')]
    private ?CompanyPosition $companyPosition = null;

    #[ORM\ManyToMany(targetEntity: PlaceWork::class, inversedBy: 'laborInformationAlephGroups')]
    private Collection $placeWork;

    #[ORM\ManyToOne(inversedBy: 'laborInformationAlephGroups')]
    private ?CompanyDepartment $companyDepartment = null;

    #[ORM\Column(nullable: true)]
    private ?bool $familyCompany = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $familyCompanyText = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateJoiningCompany = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEndCompany = null;

    #[ORM\ManyToMany(targetEntity: Employees::class, mappedBy: 'laborInformationAlephGroup')]
    private Collection $employees;

    #[ORM\Column(nullable: true)]
    private ?bool $currentPosition = null;

    #[ORM\Column(nullable: true)]
    private ?int $salary = null;

    #[ORM\ManyToMany(targetEntity: Employees::class, inversedBy: 'laborInformationAlephGroups')]
    private Collection $coordinator;

    #[ORM\ManyToOne(inversedBy: 'laborInformationAlephGroups')]
    private ?Employees $manager = null;

    #[ORM\ManyToOne(inversedBy: 'director')]
    private ?Employees $director = null;

    #[ORM\ManyToOne(inversedBy: 'executiveDirector')]
    private ?Employees $executiveDirector = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $email = null;

    public function __construct()
    {
        $this->placeWork = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->coordinator = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeType(): ?EmployeeType
    {
        return $this->employeeType;
    }

    public function setEmployeeType(?EmployeeType $employeeType): self
    {
        $this->employeeType = $employeeType;

        return $this;
    }

    public function getCompanyPosition(): ?CompanyPosition
    {
        return $this->companyPosition;
    }

    public function setCompanyPosition(?CompanyPosition $companyPosition): self
    {
        $this->companyPosition = $companyPosition;

        return $this;
    }

    /**
     * @return Collection<int, PlaceWork>
     */
    public function getPlaceWork(): Collection
    {
        return $this->placeWork;
    }

    public function addPlaceWork(PlaceWork $placeWork): self
    {
        if (!$this->placeWork->contains($placeWork)) {
            $this->placeWork->add($placeWork);
        }

        return $this;
    }

    public function removePlaceWork(PlaceWork $placeWork): self
    {
        $this->placeWork->removeElement($placeWork);

        return $this;
    }

    public function getCompanyDepartment(): ?CompanyDepartment
    {
        return $this->companyDepartment;
    }

    public function setCompanyDepartment(?CompanyDepartment $companyDepartment): self
    {
        $this->companyDepartment = $companyDepartment;

        return $this;
    }

    public function isFamilyCompany(): ?bool
    {
        return $this->familyCompany;
    }

    public function setFamilyCompany(?bool $familyCompany): self
    {
        $this->familyCompany = $familyCompany;

        return $this;
    }

    public function getFamilyCompanyText(): ?string
    {
        return $this->familyCompanyText;
    }

    public function setFamilyCompanyText(?string $familyCompanyText): self
    {
        $this->familyCompanyText = $familyCompanyText;

        return $this;
    }

    public function getDateJoiningCompany(): ?\DateTimeInterface
    {
        return $this->dateJoiningCompany;
    }

    public function setDateJoiningCompany(?\DateTimeInterface $dateJoiningCompany): self
    {
        $this->dateJoiningCompany = $dateJoiningCompany;

        return $this;
    }

    public function getDateEndCompany(): ?\DateTimeInterface
    {
        return $this->dateEndCompany;
    }

    public function setDateEndCompany(?\DateTimeInterface $dateEndCompany): self
    {
        $this->dateEndCompany = $dateEndCompany;

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
            $employee->addLaborInformationAlephGroup($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            $employee->removeLaborInformationAlephGroup($this);
        }

        return $this;
    }

    public function isCurrentPosition(): ?bool
    {
        return $this->currentPosition;
    }

    public function setCurrentPosition(?bool $currentPosition): self
    {
        $this->currentPosition = $currentPosition;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * @return Collection<int, Employees>
     */
    public function getCoordinator(): Collection
    {
        return $this->coordinator;
    }

    public function addCoordinator(Employees $coordinator): self
    {
        if (!$this->coordinator->contains($coordinator)) {
            $this->coordinator->add($coordinator);
        }

        return $this;
    }

    public function removeCoordinator(Employees $coordinator): self
    {
        $this->coordinator->removeElement($coordinator);

        return $this;
    }

    public function getManager(): ?Employees
    {
        return $this->manager;
    }

    public function setManager(?Employees $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getDirector(): ?Employees
    {
        return $this->director;
    }

    public function setDirector(?Employees $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getExecutiveDirector(): ?Employees
    {
        return $this->executiveDirector;
    }

    public function setExecutiveDirector(?Employees $executiveDirector): self
    {
        $this->executiveDirector = $executiveDirector;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
