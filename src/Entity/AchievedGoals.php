<?php

namespace App\Entity;

use App\Repository\AchievedGoalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchievedGoalsRepository::class)]
class AchievedGoals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $achievedGoals = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reasonsAchievement = null;

    #[ORM\ManyToOne(inversedBy: 'achievedGoals')]
    private ?Employees $employee = null;

    #[ORM\ManyToMany(targetEntity: SelfAppraisal::class, mappedBy: 'achievedGoals')]
    private Collection $selfAppraisals;

    public function __construct()
    {
        $this->selfAppraisals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAchievedGoals(): ?string
    {
        return $this->achievedGoals;
    }

    public function setAchievedGoals(?string $achievedGoals): self
    {
        $this->achievedGoals = $achievedGoals;

        return $this;
    }

    public function getReasonsAchievement(): ?string
    {
        return $this->reasonsAchievement;
    }

    public function setReasonsAchievement(?string $reasonsAchievement): self
    {
        $this->reasonsAchievement = $reasonsAchievement;

        return $this;
    }

    public function getEmployee(): ?Employees
    {
        return $this->employee;
    }

    public function setEmployee(?Employees $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * @return Collection<int, SelfAppraisal>
     */
    public function getSelfAppraisals(): Collection
    {
        return $this->selfAppraisals;
    }

    public function addSelfAppraisal(SelfAppraisal $selfAppraisal): self
    {
        if (!$this->selfAppraisals->contains($selfAppraisal)) {
            $this->selfAppraisals->add($selfAppraisal);
            $selfAppraisal->addAchievedGoal($this);
        }

        return $this;
    }

    public function removeSelfAppraisal(SelfAppraisal $selfAppraisal): self
    {
        if ($this->selfAppraisals->removeElement($selfAppraisal)) {
            $selfAppraisal->removeAchievedGoal($this);
        }

        return $this;
    }
}
