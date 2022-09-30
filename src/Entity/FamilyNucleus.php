<?php

namespace App\Entity;

use App\Repository\FamilyNucleusRepository;
use App\Util\TimeStampableEntity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilyNucleusRepository::class)]
class FamilyNucleus
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthDay = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $occupation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $firstNameSpouse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $secondNameSpouse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $lastNameSpouse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $motherLastNameSpouse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marriedLastNameSpouse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $birthDaySpouse = null;

    #[ORM\Column(nullable: true)]
    private ?int $ageSpouse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $documentSpouse = null;

    #[ORM\Column(nullable: true)]
    private ?bool $works = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $workPlace = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $jobPerforms = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $salary = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $timeSpouse = null;

    #[ORM\ManyToOne(inversedBy: 'familyNuclei')]
    private ?DocumentType $documentType = null;

    #[ORM\ManyToOne(inversedBy: 'familyNuclei')]
    private ?Gender $gender = null;

    #[ORM\Column(nullable: true)]
    private ?bool $dependent = null;

    #[ORM\ManyToOne(inversedBy: 'familyNuclei')]
    private ?Relationship $relationship = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getBirthDay(): ?\DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(?\DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function getFirstNameSpouse(): ?string
    {
        return $this->firstNameSpouse;
    }

    public function setFirstNameSpouse(?string $firstNameSpouse): self
    {
        $this->firstNameSpouse = $firstNameSpouse;

        return $this;
    }

    public function getSecondNameSpouse(): ?string
    {
        return $this->secondNameSpouse;
    }

    public function setSecondNameSpouse(?string $secondNameSpouse): self
    {
        $this->secondNameSpouse = $secondNameSpouse;

        return $this;
    }

    public function getLastNameSpouse(): ?string
    {
        return $this->lastNameSpouse;
    }

    public function setLastNameSpouse(?string $lastNameSpouse): self
    {
        $this->lastNameSpouse = $lastNameSpouse;

        return $this;
    }

    public function getMotherLastNameSpouse(): ?string
    {
        return $this->motherLastNameSpouse;
    }

    public function setMotherLastNameSpouse(?string $motherLastNameSpouse): self
    {
        $this->motherLastNameSpouse = $motherLastNameSpouse;

        return $this;
    }

    public function getMarriedLastNameSpouse(): ?string
    {
        return $this->marriedLastNameSpouse;
    }

    public function setMarriedLastNameSpouse(?string $marriedLastNameSpouse): self
    {
        $this->marriedLastNameSpouse = $marriedLastNameSpouse;

        return $this;
    }

    public function getBirthDaySpouse(): ?\DateTimeInterface
    {
        return $this->birthDaySpouse;
    }

    public function setBirthDaySpouse(?\DateTimeInterface $birthDaySpouse): self
    {
        $this->birthDaySpouse = $birthDaySpouse;

        return $this;
    }

    public function getAgeSpouse(): ?int
    {
        return $this->ageSpouse;
    }

    public function setAgeSpouse(?int $ageSpouse): self
    {
        $this->ageSpouse = $ageSpouse;

        return $this;
    }

    public function getDocumentSpouse(): ?string
    {
        return $this->documentSpouse;
    }

    public function setDocumentSpouse(?string $documentSpouse): self
    {
        $this->documentSpouse = $documentSpouse;

        return $this;
    }

    public function isWorks(): ?bool
    {
        return $this->works;
    }

    public function setWorks(?bool $works): self
    {
        $this->works = $works;

        return $this;
    }

    public function getWorkPlace(): ?string
    {
        return $this->workPlace;
    }

    public function setWorkPlace(?string $workPlace): self
    {
        $this->workPlace = $workPlace;

        return $this;
    }

    public function getJobPerforms(): ?string
    {
        return $this->jobPerforms;
    }

    public function setJobPerforms(?string $jobPerforms): self
    {
        $this->jobPerforms = $jobPerforms;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getTimeSpouse(): ?string
    {
        return $this->timeSpouse;
    }

    public function setTimeSpouse(?string $timeSpouse): self
    {
        $this->timeSpouse = $timeSpouse;

        return $this;
    }

    public function getDocumentType(): ?DocumentType
    {
        return $this->documentType;
    }

    public function setDocumentType(?DocumentType $documentType): self
    {
        $this->documentType = $documentType;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function isDependent(): ?bool
    {
        return $this->dependent;
    }

    public function setDependent(?bool $dependent): self
    {
        $this->dependent = $dependent;

        return $this;
    }

    public function getRelationship(): ?Relationship
    {
        return $this->relationship;
    }

    public function setRelationship(?Relationship $relationship): self
    {
        $this->relationship = $relationship;

        return $this;
    }
}
