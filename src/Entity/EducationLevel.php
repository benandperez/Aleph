<?php

namespace App\Entity;

use App\Repository\EducationLevelRepository;
use App\Util\TimeStampableEntity;
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
}
