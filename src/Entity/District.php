<?php

namespace App\Entity;

use App\Repository\DistrictRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistrictRepository::class)]
class District
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

    #[ORM\OneToMany(mappedBy: 'district', targetEntity: Employees::class)]
    private Collection $employees;

    #[ORM\ManyToOne(inversedBy: 'districts')]
    private ?Province $province = null;

    #[ORM\OneToMany(mappedBy: 'district', targetEntity: Corregimiento::class)]
    private Collection $corregimientos;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->corregimientos = new ArrayCollection();
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
            $employee->setDistrict($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            // set the owning side to null (unless already changed)
            if ($employee->getDistrict() === $this) {
                $employee->setDistrict(null);
            }
        }

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

    /**
     * @return Collection<int, Corregimiento>
     */
    public function getCorregimientos(): Collection
    {
        return $this->corregimientos;
    }

    public function addCorregimiento(Corregimiento $corregimiento): self
    {
        if (!$this->corregimientos->contains($corregimiento)) {
            $this->corregimientos->add($corregimiento);
            $corregimiento->setDistrict($this);
        }

        return $this;
    }

    public function removeCorregimiento(Corregimiento $corregimiento): self
    {
        if ($this->corregimientos->removeElement($corregimiento)) {
            // set the owning side to null (unless already changed)
            if ($corregimiento->getDistrict() === $this) {
                $corregimiento->setDistrict(null);
            }
        }

        return $this;
    }
}
