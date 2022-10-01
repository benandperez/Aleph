<?php

namespace App\Entity;

use App\Repository\StudiesCurrentlyRepository;
use App\Util\TimeStampableEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudiesCurrentlyRepository::class)]
class StudiesCurrently
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $level = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $institution = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

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
