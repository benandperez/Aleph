<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $detailProperty = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $distribution = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    private ?Province $province = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    private ?Corregimiento $corregimiento = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    private ?PropertyStatus $propertyStatus = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    private ?Country $country = null;

    #[ORM\ManyToMany(targetEntity: Employees::class, mappedBy: 'property')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailProperty(): ?string
    {
        return $this->detailProperty;
    }

    public function setDetailProperty(?string $detailProperty): self
    {
        $this->detailProperty = $detailProperty;

        return $this;
    }

    public function getDistribution(): ?string
    {
        return $this->distribution;
    }

    public function setDistribution(?string $distribution): self
    {
        $this->distribution = $distribution;

        return $this;
    }

    public function getProvince(): ?Province
    {
        return $this->province;
    }

    public function setProvince(?Province $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getCorregimiento(): ?Corregimiento
    {
        return $this->corregimiento;
    }

    public function setCorregimiento(?Corregimiento $corregimiento): self
    {
        $this->corregimiento = $corregimiento;

        return $this;
    }

    public function getPropertyStatus(): ?PropertyStatus
    {
        return $this->propertyStatus;
    }

    public function setPropertyStatus(?PropertyStatus $propertyStatus): self
    {
        $this->propertyStatus = $propertyStatus;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

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
            $employee->addProperty($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            $employee->removeProperty($this);
        }

        return $this;
    }
}
