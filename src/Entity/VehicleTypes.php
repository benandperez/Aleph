<?php

namespace App\Entity;

use App\Repository\VehicleTypesRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleTypesRepository::class)]
class VehicleTypes
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

    #[ORM\OneToMany(mappedBy: 'vehicleTypes', targetEntity: VehicleFeatures::class)]
    private Collection $vehicleFeatures;

    public function __construct()
    {
        $this->vehicleFeatures = new ArrayCollection();
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
     * @return Collection<int, VehicleFeatures>
     */
    public function getVehicleFeatures(): Collection
    {
        return $this->vehicleFeatures;
    }

    public function addVehicleFeature(VehicleFeatures $vehicleFeature): self
    {
        if (!$this->vehicleFeatures->contains($vehicleFeature)) {
            $this->vehicleFeatures->add($vehicleFeature);
            $vehicleFeature->setVehicleTypes($this);
        }

        return $this;
    }

    public function removeVehicleFeature(VehicleFeatures $vehicleFeature): self
    {
        if ($this->vehicleFeatures->removeElement($vehicleFeature)) {
            // set the owning side to null (unless already changed)
            if ($vehicleFeature->getVehicleTypes() === $this) {
                $vehicleFeature->setVehicleTypes(null);
            }
        }

        return $this;
    }
}
