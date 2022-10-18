<?php

namespace App\Entity;

use App\Repository\EmployeesRepository;
use App\Util\TimeStampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeesRepository::class)]
class Employees
{
    use TimeStampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $firstName = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $secondName = null;

    #[ORM\Column(length: 50)]
    private ?string $lastName = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $motherLastName = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marriedLastName = null;

    #[ORM\Column(length: 50)]
    private ?string $document = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expirationDate = null;

    #[ORM\Column(length: 50)]
    private ?string $birthPlace = null;

    #[ORM\Column(length: 50)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthDay = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 100)]
    private ?string $fullResidenceAddress = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $personalEmail = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $residentialTelephone = null;

    #[ORM\Column(length: 15)]
    private ?string $cellPhone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $expirationDateLicense = null;

    #[ORM\Column]
    private ?bool $hasOwnCar = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $inCaseOfEmergency = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $familyPhoneNumber = null;

    #[ORM\Column]
    private ?bool $allergic = null;

    #[ORM\Column]
    private ?bool $chronicDisease = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $allergicYes = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $chronicDiseaseYes = null;

    #[ORM\Column]
    private ?bool $bloodDonor = null;

    #[ORM\Column]
    private ?bool $bankAccount = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $accountNumber = null;

    #[ORM\Column]
    private ?bool $sportsPractice = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $whatSports = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $favoriteHobby = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?DocumentType $documentType = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?Gender $gender = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?MaritalStatus $maritalStatus = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?Province $province = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?Corregimiento $corregimiento = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?District $district = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?LicenseType $licenseType = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?BloodType $bloodType = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    private ?Bank $bank = null;

    #[ORM\ManyToMany(targetEntity: PersonalReferences::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $personalReferences;

    #[ORM\ManyToMany(targetEntity: FamilyNucleus::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $familyNucleus;

    #[ORM\ManyToMany(targetEntity: FinancialProfile::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $financialProfile;

    #[ORM\ManyToMany(targetEntity: StudiesCurrently::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $studiesCurrently;

    #[ORM\ManyToMany(targetEntity: EducationLevel::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $educationLevel;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageProfile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $employeeFolderName = null;

    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $language;

    #[ORM\ManyToMany(targetEntity: WorkingInformation::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $workingInformation;

    #[ORM\ManyToMany(targetEntity: VehicleFeatures::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $vehicleFeatures;

    #[ORM\ManyToMany(targetEntity: Property::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $property;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToMany(targetEntity: LaborInformationAlephGroup::class, inversedBy: 'employees', cascade: ['persist'])]
    private Collection $laborInformationAlephGroup;

    #[ORM\ManyToMany(targetEntity: LaborInformationAlephGroup::class, mappedBy: 'coordinator')]
    private Collection $laborInformationAlephGroups;

    #[ORM\OneToMany(mappedBy: 'director', targetEntity: LaborInformationAlephGroup::class)]
    private Collection $director;

    #[ORM\OneToMany(mappedBy: 'executiveDirector', targetEntity: LaborInformationAlephGroup::class)]
    private Collection $executiveDirector;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: AchievedGoals::class)]
    private Collection $achievedGoals;

    #[ORM\OneToMany(mappedBy: 'employee', targetEntity: UnfulfilledGoals::class)]
    private Collection $unfulfilledGoals;

    public function __construct()
    {
        $this->personalReferences = new ArrayCollection();
        $this->familyNucleus = new ArrayCollection();
        $this->financialProfile = new ArrayCollection();
        $this->studiesCurrently = new ArrayCollection();
        $this->educationLevel = new ArrayCollection();
        $this->language = new ArrayCollection();
        $this->workingInformation = new ArrayCollection();
        $this->vehicleFeatures = new ArrayCollection();
        $this->property = new ArrayCollection();
        $this->laborInformationAlephGroup = new ArrayCollection();
        $this->laborInformationAlephGroups = new ArrayCollection();
        $this->director = new ArrayCollection();
        $this->executiveDirector = new ArrayCollection();
        $this->achievedGoals = new ArrayCollection();
        $this->unfulfilledGoals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): string
    {
        return $this->getFirstName() . " " . $this->getSecondName(). " " . $this->getLastName();
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function setSecondName(?string $secondName): self
    {
        $this->secondName = $secondName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMotherLastName(): ?string
    {
        return $this->motherLastName;
    }

    public function setMotherLastName(?string $motherLastName): self
    {
        $this->motherLastName = $motherLastName;

        return $this;
    }

    public function getMarriedLastName(): ?string
    {
        return $this->marriedLastName;
    }

    public function setMarriedLastName(?string $marriedLastName): self
    {
        $this->marriedLastName = $marriedLastName;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(\DateTimeInterface $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birthPlace;
    }

    public function setBirthPlace(string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getBirthDay(): ?\DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getFullResidenceAddress(): ?string
    {
        return $this->fullResidenceAddress;
    }

    public function setFullResidenceAddress(string $fullResidenceAddress): self
    {
        $this->fullResidenceAddress = $fullResidenceAddress;

        return $this;
    }

    public function getPersonalEmail(): ?string
    {
        return $this->personalEmail;
    }

    public function setPersonalEmail(?string $personalEmail): self
    {
        $this->personalEmail = $personalEmail;

        return $this;
    }

    public function getResidentialTelephone(): ?string
    {
        return $this->residentialTelephone;
    }

    public function setResidentialTelephone(?string $residentialTelephone): self
    {
        $this->residentialTelephone = $residentialTelephone;

        return $this;
    }

    public function getCellPhone(): ?string
    {
        return $this->cellPhone;
    }

    public function setCellPhone(string $cellPhone): self
    {
        $this->cellPhone = $cellPhone;

        return $this;
    }

    public function getExpirationDateLicense(): ?\DateTimeInterface
    {
        return $this->expirationDateLicense;
    }

    public function setExpirationDateLicense(?\DateTimeInterface $expirationDateLicense): self
    {
        $this->expirationDateLicense = $expirationDateLicense;

        return $this;
    }

    public function isHasOwnCar(): ?bool
    {
        return $this->hasOwnCar;
    }

    public function setHasOwnCar(bool $hasOwnCar): self
    {
        $this->hasOwnCar = $hasOwnCar;

        return $this;
    }

    public function getInCaseOfEmergency(): ?string
    {
        return $this->inCaseOfEmergency;
    }

    public function setInCaseOfEmergency(?string $inCaseOfEmergency): self
    {
        $this->inCaseOfEmergency = $inCaseOfEmergency;

        return $this;
    }

    public function getFamilyPhoneNumber(): ?string
    {
        return $this->familyPhoneNumber;
    }

    public function setFamilyPhoneNumber(?string $familyPhoneNumber): self
    {
        $this->familyPhoneNumber = $familyPhoneNumber;

        return $this;
    }

    public function isAllergic(): ?bool
    {
        return $this->allergic;
    }

    public function setAllergic(bool $allergic): self
    {
        $this->allergic = $allergic;

        return $this;
    }

    public function isChronicDisease(): ?bool
    {
        return $this->chronicDisease;
    }

    public function setChronicDisease(bool $chronicDisease): self
    {
        $this->chronicDisease = $chronicDisease;

        return $this;
    }

    public function getAllergicYes(): ?string
    {
        return $this->allergicYes;
    }

    public function setAllergicYes(?string $allergicYes): self
    {
        $this->allergicYes = $allergicYes;

        return $this;
    }

    public function getChronicDiseaseYes(): ?string
    {
        return $this->chronicDiseaseYes;
    }

    public function setChronicDiseaseYes(?string $chronicDiseaseYes): self
    {
        $this->chronicDiseaseYes = $chronicDiseaseYes;

        return $this;
    }

    public function isBloodDonor(): ?bool
    {
        return $this->bloodDonor;
    }

    public function setBloodDonor(bool $bloodDonor): self
    {
        $this->bloodDonor = $bloodDonor;

        return $this;
    }

    public function isBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    public function setBankAccount(bool $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function isSportsPractice(): ?bool
    {
        return $this->sportsPractice;
    }

    public function setSportsPractice(bool $sportsPractice): self
    {
        $this->sportsPractice = $sportsPractice;

        return $this;
    }

    public function getWhatSports(): ?string
    {
        return $this->whatSports;
    }

    public function setWhatSports(?string $whatSports): self
    {
        $this->whatSports = $whatSports;

        return $this;
    }

    public function getFavoriteHobby(): ?string
    {
        return $this->favoriteHobby;
    }

    public function setFavoriteHobby(?string $favoriteHobby): self
    {
        $this->favoriteHobby = $favoriteHobby;

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

    public function getMaritalStatus(): ?MaritalStatus
    {
        return $this->maritalStatus;
    }

    public function setMaritalStatus(?MaritalStatus $maritalStatus): self
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    public function getProvince(): ?Province
    {
        return $this->province;
    }

    public function setProvince(?Province $province): self
    {
        $this->province = $province;

        return $this;
    }

    public function getCorregimiento(): ?Corregimiento
    {
        return $this->corregimiento;
    }

    public function setCorregimiento(?Corregimiento $corregimiento): self
    {
        $this->corregimiento = $corregimiento;

        return $this;
    }

    public function getDistrict(): ?District
    {
        return $this->district;
    }

    public function setDistrict(?District $district): self
    {
        $this->district = $district;

        return $this;
    }

    public function getLicenseType(): ?LicenseType
    {
        return $this->licenseType;
    }

    public function setLicenseType(?LicenseType $licenseType): self
    {
        $this->licenseType = $licenseType;

        return $this;
    }

    public function getBloodType(): ?BloodType
    {
        return $this->bloodType;
    }

    public function setBloodType(?BloodType $bloodType): self
    {
        $this->bloodType = $bloodType;

        return $this;
    }

    public function getBank(): ?Bank
    {
        return $this->bank;
    }

    public function setBank(?Bank $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * @return Collection<int, PersonalReferences>
     */
    public function getPersonalReferences(): Collection
    {
        return $this->personalReferences;
    }

    public function addPersonalReference(PersonalReferences $personalReference): self
    {
        if (!$this->personalReferences->contains($personalReference)) {
            $this->personalReferences->add($personalReference);
        }

        return $this;
    }

    public function removePersonalReference(PersonalReferences $personalReference): self
    {
        $this->personalReferences->removeElement($personalReference);

        return $this;
    }

    /**
     * @return Collection<int, FamilyNucleus>
     */
    public function getFamilyNucleus(): Collection
    {
        return $this->familyNucleus;
    }

    public function addFamilyNucleu(FamilyNucleus $familyNucleu): self
    {
        if (!$this->familyNucleus->contains($familyNucleu)) {
            $this->familyNucleus->add($familyNucleu);
        }

        return $this;
    }

    public function removeFamilyNucleu(FamilyNucleus $familyNucleu): self
    {
        $this->familyNucleus->removeElement($familyNucleu);

        return $this;
    }

    /**
     * @return Collection<int, FinancialProfile>
     */
    public function getFinancialProfile(): Collection
    {
        return $this->financialProfile;
    }

    public function addFinancialProfile(FinancialProfile $financialProfile): self
    {
        if (!$this->financialProfile->contains($financialProfile)) {
            $this->financialProfile->add($financialProfile);
        }

        return $this;
    }

    public function removeFinancialProfile(FinancialProfile $financialProfile): self
    {
        $this->financialProfile->removeElement($financialProfile);

        return $this;
    }

    /**
     * @return Collection<int, StudiesCurrently>
     */
    public function getStudiesCurrently(): Collection
    {
        return $this->studiesCurrently;
    }

    public function addStudiesCurrently(StudiesCurrently $studiesCurrently): self
    {
        if (!$this->studiesCurrently->contains($studiesCurrently)) {
            $this->studiesCurrently->add($studiesCurrently);
        }

        return $this;
    }

    public function removeStudiesCurrently(StudiesCurrently $studiesCurrently): self
    {
        $this->studiesCurrently->removeElement($studiesCurrently);

        return $this;
    }

    /**
     * @return Collection<int, EducationLevel>
     */
    public function getEducationLevel(): Collection
    {
        return $this->educationLevel;
    }

    public function addEducationLevel(EducationLevel $educationLevel): self
    {
        if (!$this->educationLevel->contains($educationLevel)) {
            $this->educationLevel->add($educationLevel);
        }

        return $this;
    }

    public function removeEducationLevel(EducationLevel $educationLevel): self
    {
        $this->educationLevel->removeElement($educationLevel);

        return $this;
    }

    public function getImageProfile(): ?string
    {
        return $this->imageProfile;
    }

    public function setImageProfile(?string $imageProfile): self
    {
        $this->imageProfile = $imageProfile;

        return $this;
    }

    public function getEmployeeFolderName(): ?string
    {
        return $this->employeeFolderName;
    }

    public function setEmployeeFolderName(?string $employeeFolderName): self
    {
        $this->employeeFolderName = $employeeFolderName;

        return $this;
    }

    /**
     * @return Collection<int, Language>
     */
    public function getLanguage(): Collection
    {
        return $this->language;
    }

    public function addLanguage(Language $language): self
    {
        if (!$this->language->contains($language)) {
            $this->language->add($language);
        }

        return $this;
    }

    public function removeLanguage(Language $language): self
    {
        $this->language->removeElement($language);

        return $this;
    }

    /**
     * @return Collection<int, WorkingInformation>
     */
    public function getWorkingInformation(): Collection
    {
        return $this->workingInformation;
    }

    public function addWorkingInformation(WorkingInformation $workingInformation): self
    {
        if (!$this->workingInformation->contains($workingInformation)) {
            $this->workingInformation->add($workingInformation);
        }

        return $this;
    }

    public function removeWorkingInformation(WorkingInformation $workingInformation): self
    {
        $this->workingInformation->removeElement($workingInformation);

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
        }

        return $this;
    }

    public function removeVehicleFeature(VehicleFeatures $vehicleFeature): self
    {
        $this->vehicleFeatures->removeElement($vehicleFeature);

        return $this;
    }

    /**
     * @return Collection<int, Property>
     */
    public function getProperty(): Collection
    {
        return $this->property;
    }

    public function addProperty(Property $property): self
    {
        if (!$this->property->contains($property)) {
            $this->property->add($property);
        }

        return $this;
    }

    public function removeProperty(Property $property): self
    {
        $this->property->removeElement($property);

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
     * @return Collection<int, LaborInformationAlephGroup>
     */
    public function getLaborInformationAlephGroup(): Collection
    {
        return $this->laborInformationAlephGroup;
    }

    public function addLaborInformationAlephGroup(LaborInformationAlephGroup $laborInformationAlephGroup): self
    {
        if (!$this->laborInformationAlephGroup->contains($laborInformationAlephGroup)) {
            $this->laborInformationAlephGroup->add($laborInformationAlephGroup);
        }

        return $this;
    }

    public function removeLaborInformationAlephGroup(LaborInformationAlephGroup $laborInformationAlephGroup): self
    {
        $this->laborInformationAlephGroup->removeElement($laborInformationAlephGroup);

        return $this;
    }

    /**
     * @return Collection<int, LaborInformationAlephGroup>
     */
    public function getLaborInformationAlephGroups(): Collection
    {
        return $this->laborInformationAlephGroups;
    }

    /**
     * @return Collection<int, LaborInformationAlephGroup>
     */
    public function getDirector(): Collection
    {
        return $this->director;
    }

    public function addDirector(LaborInformationAlephGroup $director): self
    {
        if (!$this->director->contains($director)) {
            $this->director->add($director);
            $director->setDirector($this);
        }

        return $this;
    }

    public function removeDirector(LaborInformationAlephGroup $director): self
    {
        if ($this->director->removeElement($director)) {
            // set the owning side to null (unless already changed)
            if ($director->getDirector() === $this) {
                $director->setDirector(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LaborInformationAlephGroup>
     */
    public function getExecutiveDirector(): Collection
    {
        return $this->executiveDirector;
    }

    public function addExecutiveDirector(LaborInformationAlephGroup $executiveDirector): self
    {
        if (!$this->executiveDirector->contains($executiveDirector)) {
            $this->executiveDirector->add($executiveDirector);
            $executiveDirector->setExecutiveDirector($this);
        }

        return $this;
    }

    public function removeExecutiveDirector(LaborInformationAlephGroup $executiveDirector): self
    {
        if ($this->executiveDirector->removeElement($executiveDirector)) {
            // set the owning side to null (unless already changed)
            if ($executiveDirector->getExecutiveDirector() === $this) {
                $executiveDirector->setExecutiveDirector(null);
            }
        }

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
            $achievedGoal->setEmployee($this);
        }

        return $this;
    }

    public function removeAchievedGoal(AchievedGoals $achievedGoal): self
    {
        if ($this->achievedGoals->removeElement($achievedGoal)) {
            // set the owning side to null (unless already changed)
            if ($achievedGoal->getEmployee() === $this) {
                $achievedGoal->setEmployee(null);
            }
        }

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
            $unfulfilledGoal->setEmployee($this);
        }

        return $this;
    }

    public function removeUnfulfilledGoal(UnfulfilledGoals $unfulfilledGoal): self
    {
        if ($this->unfulfilledGoals->removeElement($unfulfilledGoal)) {
            // set the owning side to null (unless already changed)
            if ($unfulfilledGoal->getEmployee() === $this) {
                $unfulfilledGoal->setEmployee(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->getFirstName().' '.$this->getLastName();
        // TODO: Implement __toString() method.
    }
}
