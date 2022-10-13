<?php

namespace App\Entity;

use App\Repository\VehicleFeaturesRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleFeaturesRepository::class)]
class VehicleFeatures
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vehicleFeatures')]
    private ?VehicleTypes $vehicleTypes = null;

    #[ORM\Column(length: 50)]
    private ?string $plateNumber = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $yearProduction = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $mark = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Employees::class, mappedBy: 'vehicleFeatures')]
    private Collection $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicleTypes(): ?VehicleTypes
    {
        return $this->vehicleTypes;
    }

    public function setVehicleTypes(?VehicleTypes $vehicleTypes): self
    {
        $this->vehicleTypes = $vehicleTypes;

        return $this;
    }

    public function getPlateNumber(): ?string
    {
        return $this->plateNumber;
    }

    public function setPlateNumber(string $plateNumber): self
    {
        $this->plateNumber = $plateNumber;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYearProduction(): ?string
    {
        return $this->yearProduction;
    }

    public function setYearProduction(?string $yearProduction): self
    {
        $this->yearProduction = $yearProduction;

        return $this;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(?string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $employee->addVehicleFeature($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            $employee->removeVehicleFeature($this);
        }

        return $this;
    }
}
