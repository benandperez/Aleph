<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use App\Util\TimeStampableEntity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $institution = null;

    #[ORM\Column(nullable: true)]
    private ?bool $certificate = null;

    #[ORM\ManyToOne(inversedBy: 'languages')]
    private ?LanguageLevel $languageLevel = null;

    #[ORM\ManyToOne(inversedBy: 'languages')]
    private ?LanguageLevel $languageLevelWritten = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

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

    public function isCertificate(): ?bool
    {
        return $this->certificate;
    }

    public function setCertificate(?bool $certificate): self
    {
        $this->certificate = $certificate;

        return $this;
    }

    public function getLanguageLevel(): ?LanguageLevel
    {
        return $this->languageLevel;
    }

    public function setLanguageLevel(?LanguageLevel $languageLevel): self
    {
        $this->languageLevel = $languageLevel;

        return $this;
    }

    public function getLanguageLevelWritten(): ?LanguageLevel
    {
        return $this->languageLevelWritten;
    }

    public function setLanguageLevelWritten(?LanguageLevel $languageLevelWritten): self
    {
        $this->languageLevelWritten = $languageLevelWritten;

        return $this;
    }
}
