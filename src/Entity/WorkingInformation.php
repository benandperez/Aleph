<?php

namespace App\Entity;

use App\Repository\WorkingInformationRepository;
use App\Util\TimeStampableEntity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkingInformationRepository::class)]
class WorkingInformation
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $since = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $until = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $business = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $positionHeld = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $directBoss = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $referencePhone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSince(): ?\DateTimeInterface
    {
        return $this->since;
    }

    public function setSince(?\DateTimeInterface $since): self
    {
        $this->since = $since;

        return $this;
    }

    public function getUntil(): ?\DateTimeInterface
    {
        return $this->until;
    }

    public function setUntil(?\DateTimeInterface $until): self
    {
        $this->until = $until;

        return $this;
    }

    public function getBusiness(): ?string
    {
        return $this->business;
    }

    public function setBusiness(?string $business): self
    {
        $this->business = $business;

        return $this;
    }

    public function getPositionHeld(): ?string
    {
        return $this->positionHeld;
    }

    public function setPositionHeld(?string $positionHeld): self
    {
        $this->positionHeld = $positionHeld;

        return $this;
    }

    public function getDirectBoss(): ?string
    {
        return $this->directBoss;
    }

    public function setDirectBoss(?string $directBoss): self
    {
        $this->directBoss = $directBoss;

        return $this;
    }

    public function getReferencePhone(): ?string
    {
        return $this->referencePhone;
    }

    public function setReferencePhone(?string $referencePhone): self
    {
        $this->referencePhone = $referencePhone;

        return $this;
    }
}
