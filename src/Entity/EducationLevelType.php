<?php

namespace App\Entity;

use App\Repository\EducationLevelTypeRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducationLevelTypeRepository::class)]
class EducationLevelType
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

    #[ORM\OneToMany(mappedBy: 'educationLevelType', targetEntity: EducationLevel::class)]
    private Collection $educationLevels;

    public function __construct()
    {
        $this->educationLevels = new ArrayCollection();
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
     * @return Collection<int, EducationLevel>
     */
    public function getEducationLevels(): Collection
    {
        return $this->educationLevels;
    }

    public function addEducationLevel(EducationLevel $educationLevel): self
    {
        if (!$this->educationLevels->contains($educationLevel)) {
            $this->educationLevels->add($educationLevel);
            $educationLevel->setEducationLevelType($this);
        }

        return $this;
    }

    public function removeEducationLevel(EducationLevel $educationLevel): self
    {
        if ($this->educationLevels->removeElement($educationLevel)) {
            // set the owning side to null (unless already changed)
            if ($educationLevel->getEducationLevelType() === $this) {
                $educationLevel->setEducationLevelType(null);
            }
        }

        return $this;
    }
}
