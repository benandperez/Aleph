<?php

namespace App\Entity;

use App\Repository\UnfulfilledGoalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnfulfilledGoalsRepository::class)]
class UnfulfilledGoals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $unfulfilledGoals = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reasonsForNonAchievement = null;

    #[ORM\ManyToOne(inversedBy: 'unfulfilledGoals')]
    private ?Employees $employee = null;

    #[ORM\ManyToMany(targetEntity: SelfAppraisal::class, mappedBy: 'unfulfilledGoals')]
    private Collection $selfAppraisals;

    public function __construct()
    {
        $this->selfAppraisals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnfulfilledGoals(): ?string
    {
        return $this->unfulfilledGoals;
    }

    public function setUnfulfilledGoals(?string $unfulfilledGoals): self
    {
        $this->unfulfilledGoals = $unfulfilledGoals;

        return $this;
    }

    public function getReasonsForNonAchievement(): ?string
    {
        return $this->reasonsForNonAchievement;
    }

    public function setReasonsForNonAchievement(?string $reasonsForNonAchievement): self
    {
        $this->reasonsForNonAchievement = $reasonsForNonAchievement;

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
            $selfAppraisal->addUnfulfilledGoal($this);
        }

        return $this;
    }

    public function removeSelfAppraisal(SelfAppraisal $selfAppraisal): self
    {
        if ($this->selfAppraisals->removeElement($selfAppraisal)) {
            $selfAppraisal->removeUnfulfilledGoal($this);
        }

        return $this;
    }
}
