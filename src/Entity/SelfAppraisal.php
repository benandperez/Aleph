<?php

namespace App\Entity;

use App\Repository\SelfAppraisalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SelfAppraisalRepository::class)]
class SelfAppraisal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: AchievedGoals::class, inversedBy: 'selfAppraisals', cascade: ['persist'])]
    private Collection $achievedGoals;

    #[ORM\ManyToMany(targetEntity: UnfulfilledGoals::class, inversedBy: 'selfAppraisals', cascade: ['persist'])]
    private Collection $unfulfilledGoals;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    public function __construct()
    {
        $this->achievedGoals = new ArrayCollection();
        $this->unfulfilledGoals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, AchievedGoals>
     */
    public function getAchievedGoals(): Collection
    {
        return $this->achievedGoals;
    }

    public function addAchievedGoal(AchievedGoals $achievedGoal): self
    {
        if (!$this->achievedGoals->contains($achievedGoal)) {
            $this->achievedGoals->add($achievedGoal);
        }

        return $this;
    }

    public function removeAchievedGoal(AchievedGoals $achievedGoal): self
    {
        $this->achievedGoals->removeElement($achievedGoal);

        return $this;
    }

    /**
     * @return Collection<int, UnfulfilledGoals>
     */
    public function getUnfulfilledGoals(): Collection
    {
        return $this->unfulfilledGoals;
    }

    public function addUnfulfilledGoal(UnfulfilledGoals $unfulfilledGoal): self
    {
        if (!$this->unfulfilledGoals->contains($unfulfilledGoal)) {
            $this->unfulfilledGoals->add($unfulfilledGoal);
        }

        return $this;
    }

    public function removeUnfulfilledGoal(UnfulfilledGoals $unfulfilledGoal): self
    {
        $this->unfulfilledGoals->removeElement($unfulfilledGoal);

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
