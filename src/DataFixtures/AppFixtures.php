<?php

namespace App\DataFixtures;

use App\Entity\AccountType;
use App\Entity\Bank;
use App\Entity\BloodType;
use App\Entity\Corregimiento;
use App\Entity\District;
use App\Entity\DocumentType;
use App\Entity\EmployeeType;
use App\Entity\Gender;
use App\Entity\LanguageLevel;
use App\Entity\LicenseType;
use App\Entity\MaritalStatus;
use App\Entity\PlaceWork;
use App\Entity\PropertyStatus;
use App\Entity\Province;
use App\Entity\Relationship;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {


        $user = new User();
        $user->setEmail('bperez@hotmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user,'password'));
        $user->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('bperez2@hotmail.com');
        $user2->setPassword($this->passwordHasher->hashPassword($user2,'password'));
        $user2->setRoles(["ROLE_USER"]);
        $manager->persist($user2);


        /**
         * Data Tipo de Empleado
         */

        $employeeType = new EmployeeType();
        $employeeType->setName('Permanente');
        $employeeType->setStatus(true);
        $employeeType->setCreatedAt(new \DateTime());
        $employeeType->setUpdatedAt(new \DateTime());
        $manager->persist($employeeType);

        $employeeType = new EmployeeType();
        $employeeType->setName('Eventual');
        $employeeType->setStatus(true);
        $employeeType->setCreatedAt(new \DateTime());
        $employeeType->setUpdatedAt(new \DateTime());
        $manager->persist($employeeType);

        /**
         * Data Tipo de Identificacion
         */

        $documentType = new DocumentType();
        $documentType->setName('Cedula de ciudadania');
        $documentType->setStatus(true);
        $documentType->setCreatedAt(new \DateTime());
        $documentType->setUpdatedAt(new \DateTime());
        $manager->persist($documentType);

        $documentType1 = new DocumentType();
        $documentType1->setName('Registro civil de nacimiento');
        $documentType1->setStatus(true);
        $documentType1->setCreatedAt(new \DateTime());
        $documentType1->setUpdatedAt(new \DateTime());
        $manager->persist($documentType1);

        $documentType2 = new DocumentType();
        $documentType2->setName('Tarjeta de identidad');
        $documentType2->setStatus(true);
        $documentType2->setCreatedAt(new \DateTime());
        $documentType2->setUpdatedAt(new \DateTime());
        $manager->persist($documentType2);

        $documentType3 = new DocumentType();
        $documentType3->setName('Tarjeta de extranjeria');
        $documentType3->setStatus(true);
        $documentType3->setCreatedAt(new \DateTime());
        $documentType3->setUpdatedAt(new \DateTime());
        $manager->persist($documentType3);

        $documentType4 = new DocumentType();
        $documentType4->setName('Cedula de extranjeria');
        $documentType4->setStatus(true);
        $documentType4->setCreatedAt(new \DateTime());
        $documentType4->setUpdatedAt(new \DateTime());
        $manager->persist($documentType4);

        $documentType5 = new DocumentType();
        $documentType5->setName('NIT');
        $documentType5->setStatus(true);
        $documentType5->setCreatedAt(new \DateTime());
        $documentType5->setUpdatedAt(new \DateTime());
        $manager->persist($documentType5);

        $documentType6 = new DocumentType();
        $documentType6->setName('Pasaporte');
        $documentType6->setStatus(true);
        $documentType6->setCreatedAt(new \DateTime());
        $documentType6->setUpdatedAt(new \DateTime());
        $manager->persist($documentType6);

        $documentType7 = new DocumentType();
        $documentType7->setName('Tipo de documento extranjero');
        $documentType7->setStatus(true);
        $documentType7->setCreatedAt(new \DateTime());
        $documentType7->setUpdatedAt(new \DateTime());
        $manager->persist($documentType7);

        /**
         * Marital Status
         */

        $maritalStatus = new MaritalStatus();
        $maritalStatus->setName('Unido (a)');
        $maritalStatus->setStatus(true);
        $maritalStatus->setCreatedAt(new \DateTime());
        $maritalStatus->setUpdatedAt(new \DateTime());
        $manager->persist($maritalStatus);

        $maritalStatus2 = new MaritalStatus();
        $maritalStatus2->setName('Soltero (a)');
        $maritalStatus2->setStatus(true);
        $maritalStatus2->setCreatedAt(new \DateTime());
        $maritalStatus2->setUpdatedAt(new \DateTime());
        $manager->persist($maritalStatus2);

        $maritalStatus3 = new MaritalStatus();
        $maritalStatus3->setName('Casado (a)');
        $maritalStatus3->setStatus(true);
        $maritalStatus3->setCreatedAt(new \DateTime());
        $maritalStatus3->setUpdatedAt(new \DateTime());
        $manager->persist($maritalStatus3);

        /**
         * Province
         */

        $province = new Province();
        $province->setName('Bocas del Toro');
        $province->setStatus(true);
        $province->setCreatedAt(new \DateTime());
        $province->setUpdatedAt(new \DateTime());
        $manager->persist($province);

        $province2 = new Province();
        $province2->setName('Chiriquí');
        $province2->setStatus(true);
        $province2->setCreatedAt(new \DateTime());
        $province2->setUpdatedAt(new \DateTime());
        $manager->persist($province2);

        $province3 = new Province();
        $province3->setName('Coclé');
        $province3->setStatus(true);
        $province3->setCreatedAt(new \DateTime());
        $province3->setUpdatedAt(new \DateTime());
        $manager->persist($province3);

        $province4 = new Province();
        $province4->setName('Colón');
        $province4->setStatus(true);
        $province4->setCreatedAt(new \DateTime());
        $province4->setUpdatedAt(new \DateTime());
        $manager->persist($province4);

        $province5 = new Province();
        $province5->setName('Darién');
        $province5->setStatus(true);
        $province5->setCreatedAt(new \DateTime());
        $province5->setUpdatedAt(new \DateTime());
        $manager->persist($province5);

        $province6 = new Province();
        $province6->setName('Herrera');
        $province6->setStatus(true);
        $province6->setCreatedAt(new \DateTime());
        $province6->setUpdatedAt(new \DateTime());
        $manager->persist($province6);

        $province7 = new Province();
        $province7->setName('Los Santos');
        $province7->setStatus(true);
        $province7->setCreatedAt(new \DateTime());
        $province7->setUpdatedAt(new \DateTime());
        $manager->persist($province7);

        $province8 = new Province();
        $province8->setName('Panamá');
        $province8->setStatus(true);
        $province8->setCreatedAt(new \DateTime());
        $province8->setUpdatedAt(new \DateTime());
        $manager->persist($province8);

        $province9 = new Province();
        $province9->setName('Panamá Oeste');
        $province9->setStatus(true);
        $province9->setCreatedAt(new \DateTime());
        $province9->setUpdatedAt(new \DateTime());
        $manager->persist($province9);

        $province10 = new Province();
        $province10->setName('Veraguas');
        $province10->setStatus(true);
        $province10->setCreatedAt(new \DateTime());
        $province10->setUpdatedAt(new \DateTime());
        $manager->persist($province10);

        $province11 = new Province();
        $province11->setName('Emberá-Wounaan');
        $province11->setStatus(true);
        $province11->setCreatedAt(new \DateTime());
        $province11->setUpdatedAt(new \DateTime());
        $manager->persist($province11);

        $province12 = new Province();
        $province12->setName('Guna Yala');
        $province12->setStatus(true);
        $province12->setCreatedAt(new \DateTime());
        $province12->setUpdatedAt(new \DateTime());
        $manager->persist($province12);

        $province13 = new Province();
        $province13->setName('Naso Tjër Di');
        $province13->setStatus(true);
        $province13->setCreatedAt(new \DateTime());
        $province13->setUpdatedAt(new \DateTime());
        $manager->persist($province13);

        $province14 = new Province();
        $province14->setName('Ngäbe-Buglé');
        $province14->setStatus(true);
        $province14->setCreatedAt(new \DateTime());
        $province14->setUpdatedAt(new \DateTime());
        $manager->persist($province14);

        /**
         * District
         */

        $district1_1 = new District();
        $district1_1->setName('Almirante');
        $district1_1->setStatus(true);
        $district1_1->setProvince($province);
        $district1_1->setCreatedAt(new \DateTime());
        $district1_1->setUpdatedAt(new \DateTime());
        $manager->persist($district1_1);

        $district1_2 = new District();
        $district1_2->setName('Bocas del Toro');
        $district1_2->setStatus(true);
        $district1_2->setProvince($province);
        $district1_2->setCreatedAt(new \DateTime());
        $district1_2->setUpdatedAt(new \DateTime());
        $manager->persist($district1_2);

        $district1_3 = new District();
        $district1_3->setName('Changuinola');
        $district1_3->setStatus(true);
        $district1_3->setProvince($province);
        $district1_3->setCreatedAt(new \DateTime());
        $district1_3->setUpdatedAt(new \DateTime());
        $manager->persist($district1_3);

        $district1_4 = new District();
        $district1_4->setName('Chiriquí Grande');
        $district1_4->setStatus(true);
        $district1_4->setProvince($province);
        $district1_4->setCreatedAt(new \DateTime());
        $district1_4->setUpdatedAt(new \DateTime());
        $manager->persist($district1_4);

        $district2_1 = new District();
        $district2_1->setName('Alanje');
        $district2_1->setStatus(true);
        $district2_1->setProvince($province2);
        $district2_1->setCreatedAt(new \DateTime());
        $district2_1->setUpdatedAt(new \DateTime());
        $manager->persist($district2_1);

        $district2_2 = new District();
        $district2_2->setName('Barú');
        $district2_2->setStatus(true);
        $district2_2->setProvince($province2);
        $district2_2->setCreatedAt(new \DateTime());
        $district2_2->setUpdatedAt(new \DateTime());
        $manager->persist($district2_2);

        $district2_3 = new District();
        $district2_3->setName('Boquerón');
        $district2_3->setStatus(true);
        $district2_3->setProvince($province2);
        $district2_3->setCreatedAt(new \DateTime());
        $district2_3->setUpdatedAt(new \DateTime());
        $manager->persist($district2_3);

        $district2_4 = new District();
        $district2_4->setName('Boquete');
        $district2_4->setStatus(true);
        $district2_4->setProvince($province2);
        $district2_4->setCreatedAt(new \DateTime());
        $district2_4->setUpdatedAt(new \DateTime());
        $manager->persist($district2_4);

        $district2_5 = new District();
        $district2_5->setName('Bugaba');
        $district2_5->setStatus(true);
        $district2_5->setProvince($province2);
        $district2_5->setCreatedAt(new \DateTime());
        $district2_5->setUpdatedAt(new \DateTime());
        $manager->persist($district2_5);

        $district2_6 = new District();
        $district2_6->setName('David');
        $district2_6->setStatus(true);
        $district2_6->setProvince($province2);
        $district2_6->setCreatedAt(new \DateTime());
        $district2_6->setUpdatedAt(new \DateTime());
        $manager->persist($district2_6);

        $district2_7 = new District();
        $district2_7->setName('Dolega');
        $district2_7->setStatus(true);
        $district2_7->setProvince($province2);
        $district2_7->setCreatedAt(new \DateTime());
        $district2_7->setUpdatedAt(new \DateTime());
        $manager->persist($district2_7);

        $district2_8 = new District();
        $district2_8->setName('Gualaca');
        $district2_8->setStatus(true);
        $district2_8->setProvince($province2);
        $district2_8->setCreatedAt(new \DateTime());
        $district2_8->setUpdatedAt(new \DateTime());
        $manager->persist($district2_8);

        $district2_9 = new District();
        $district2_9->setName('Remedios');
        $district2_9->setStatus(true);
        $district2_9->setProvince($province2);
        $district2_9->setCreatedAt(new \DateTime());
        $district2_9->setUpdatedAt(new \DateTime());
        $manager->persist($district2_9);

        $district2_10 = new District();
        $district2_10->setName('Renacimiento');
        $district2_10->setStatus(true);
        $district2_10->setProvince($province2);
        $district2_10->setCreatedAt(new \DateTime());
        $district2_10->setUpdatedAt(new \DateTime());
        $manager->persist($district2_10);

        $district2_11 = new District();
        $district2_11->setName('San Félix');
        $district2_11->setStatus(true);
        $district2_11->setProvince($province2);
        $district2_11->setCreatedAt(new \DateTime());
        $district2_11->setUpdatedAt(new \DateTime());
        $manager->persist($district2_11);

        $district2_12 = new District();
        $district2_12->setName('San Lorenzo');
        $district2_12->setStatus(true);
        $district2_12->setProvince($province2);
        $district2_12->setCreatedAt(new \DateTime());
        $district2_12->setUpdatedAt(new \DateTime());
        $manager->persist($district2_12);

        $district2_13 = new District();
        $district2_13->setName('Tierras Altas');
        $district2_13->setStatus(true);
        $district2_13->setProvince($province2);
        $district2_13->setCreatedAt(new \DateTime());
        $district2_13->setUpdatedAt(new \DateTime());
        $manager->persist($district2_13);

        $district2_14 = new District();
        $district2_14->setName('Tolé');
        $district2_14->setStatus(true);
        $district2_14->setProvince($province2);
        $district2_14->setCreatedAt(new \DateTime());
        $district2_14->setUpdatedAt(new \DateTime());
        $manager->persist($district2_14);

        $district3_1 = new District();
        $district3_1->setName('Aguadulce');
        $district3_1->setStatus(true);
        $district3_1->setProvince($province3);
        $district3_1->setCreatedAt(new \DateTime());
        $district3_1->setUpdatedAt(new \DateTime());
        $manager->persist($district3_1);

        $district3_2 = new District();
        $district3_2->setName('Antón');
        $district3_2->setStatus(true);
        $district3_2->setProvince($province3);
        $district3_2->setCreatedAt(new \DateTime());
        $district3_2->setUpdatedAt(new \DateTime());
        $manager->persist($district3_2);

        $district3_3 = new District();
        $district3_3->setName('La Pintada');
        $district3_3->setStatus(true);
        $district3_3->setProvince($province3);
        $district3_3->setCreatedAt(new \DateTime());
        $district3_3->setUpdatedAt(new \DateTime());
        $manager->persist($district3_3);

        $district3_4 = new District();
        $district3_4->setName('Natá');
        $district3_4->setStatus(true);
        $district3_4->setProvince($province3);
        $district3_4->setCreatedAt(new \DateTime());
        $district3_4->setUpdatedAt(new \DateTime());
        $manager->persist($district3_4);

        $district3_5 = new District();
        $district3_5->setName('Olá');
        $district3_5->setStatus(true);
        $district3_5->setProvince($province3);
        $district3_5->setCreatedAt(new \DateTime());
        $district3_5->setUpdatedAt(new \DateTime());
        $manager->persist($district3_5);

        $district3_6 = new District();
        $district3_6->setName('Penonomé');
        $district3_6->setStatus(true);
        $district3_6->setProvince($province3);
        $district3_6->setCreatedAt(new \DateTime());
        $district3_6->setUpdatedAt(new \DateTime());
        $manager->persist($district3_6);

        /**
         * Corregimientos
         */

        $corregimiento1_1 = new Corregimiento();
        $corregimiento1_1->setName('Almirante');
        $corregimiento1_1->setStatus(true);
        $corregimiento1_1->setDistrict($district1_1);
        $corregimiento1_1->setCreatedAt(new \DateTime());
        $corregimiento1_1->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_1);

        $corregimiento1_2 = new Corregimiento();
        $corregimiento1_2->setName('Bajo Culubre');
        $corregimiento1_2->setStatus(true);
        $corregimiento1_2->setDistrict($district1_1);
        $corregimiento1_2->setCreatedAt(new \DateTime());
        $corregimiento1_2->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_2);

        $corregimiento1_3 = new Corregimiento();
        $corregimiento1_3->setName('Barriada Guaymí');
        $corregimiento1_3->setStatus(true);
        $corregimiento1_3->setDistrict($district1_1);
        $corregimiento1_3->setCreatedAt(new \DateTime());
        $corregimiento1_3->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_3);

        $corregimiento1_4 = new Corregimiento();
        $corregimiento1_4->setName('Barrio Francés');
        $corregimiento1_4->setStatus(true);
        $corregimiento1_4->setDistrict($district1_1);
        $corregimiento1_4->setCreatedAt(new \DateTime());
        $corregimiento1_4->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_4);

        $corregimiento1_5 = new Corregimiento();
        $corregimiento1_5->setName('Cauchero');
        $corregimiento1_5->setStatus(true);
        $corregimiento1_5->setDistrict($district1_1);
        $corregimiento1_5->setCreatedAt(new \DateTime());
        $corregimiento1_5->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_5);

        $corregimiento1_6 = new Corregimiento();
        $corregimiento1_6->setName('Ceiba');
        $corregimiento1_6->setStatus(true);
        $corregimiento1_6->setDistrict($district1_1);
        $corregimiento1_6->setCreatedAt(new \DateTime());
        $corregimiento1_6->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_6);

        $corregimiento1_7 = new Corregimiento();
        $corregimiento1_7->setName('Miraflores');
        $corregimiento1_7->setStatus(true);
        $corregimiento1_7->setDistrict($district1_1);
        $corregimiento1_7->setCreatedAt(new \DateTime());
        $corregimiento1_7->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_7);

        $corregimiento1_8 = new Corregimiento();
        $corregimiento1_8->setName('Nance de Riscó');
        $corregimiento1_8->setStatus(true);
        $corregimiento1_8->setDistrict($district1_1);
        $corregimiento1_8->setCreatedAt(new \DateTime());
        $corregimiento1_8->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_8);

        $corregimiento1_9 = new Corregimiento();
        $corregimiento1_9->setName('Valle de Aguas Arriba');
        $corregimiento1_9->setStatus(true);
        $corregimiento1_9->setDistrict($district1_1);
        $corregimiento1_9->setCreatedAt(new \DateTime());
        $corregimiento1_9->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_9);

        $corregimiento1_10 = new Corregimiento();
        $corregimiento1_10->setName('Valle de Riscó');
        $corregimiento1_10->setStatus(true);
        $corregimiento1_10->setDistrict($district1_1);
        $corregimiento1_10->setCreatedAt(new \DateTime());
        $corregimiento1_10->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento1_10);

        $corregimiento2_1 = new Corregimiento();
        $corregimiento2_1->setName('Bastimentos');
        $corregimiento2_1->setStatus(true);
        $corregimiento2_1->setDistrict($district1_2);
        $corregimiento2_1->setCreatedAt(new \DateTime());
        $corregimiento2_1->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_1);

        $corregimiento2_2 = new Corregimiento();
        $corregimiento2_2->setName('Bocas del Toro');
        $corregimiento2_2->setStatus(true);
        $corregimiento2_2->setDistrict($district1_2);
        $corregimiento2_2->setCreatedAt(new \DateTime());
        $corregimiento2_2->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_2);

        $corregimiento2_3 = new Corregimiento();
        $corregimiento2_3->setName('Boca del Drago');
        $corregimiento2_3->setStatus(true);
        $corregimiento2_3->setDistrict($district1_2);
        $corregimiento2_3->setCreatedAt(new \DateTime());
        $corregimiento2_3->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_3);

        $corregimiento2_4 = new Corregimiento();
        $corregimiento2_4->setName('Punta Laurel');
        $corregimiento2_4->setStatus(true);
        $corregimiento2_4->setDistrict($district1_2);
        $corregimiento2_4->setCreatedAt(new \DateTime());
        $corregimiento2_4->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_4);

        $corregimiento2_4 = new Corregimiento();
        $corregimiento2_4->setName('Tierra Oscura');
        $corregimiento2_4->setStatus(true);
        $corregimiento2_4->setDistrict($district1_2);
        $corregimiento2_4->setCreatedAt(new \DateTime());
        $corregimiento2_4->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_4);

        $corregimiento2_5 = new Corregimiento();
        $corregimiento2_5->setName('San Cristóbal');
        $corregimiento2_5->setStatus(true);
        $corregimiento2_5->setDistrict($district1_2);
        $corregimiento2_5->setCreatedAt(new \DateTime());
        $corregimiento2_5->setUpdatedAt(new \DateTime());
        $manager->persist($corregimiento2_5);


        /**
         * License
         */

        $license = new LicenseType();
        $license->setName('A: Bicicleta');
        $license->setStatus(true);
        $license->setCreatedAt(new \DateTime());
        $license->setUpdatedAt(new \DateTime());
        $manager->persist($license);

        $license2 = new LicenseType();
        $license2->setName('B: Motocicleta');
        $license2->setStatus(true);
        $license2->setCreatedAt(new \DateTime());
        $license2->setUpdatedAt(new \DateTime());
        $manager->persist($license2);

        $license3 = new LicenseType();
        $license3->setName('C: Automóvil y camioneta');
        $license3->setStatus(true);
        $license3->setCreatedAt(new \DateTime());
        $license3->setUpdatedAt(new \DateTime());
        $manager->persist($license3);

        $license4 = new LicenseType();
        $license4->setName('D: Camiones ligeros hasta ocho toneladas y autobuses con un límite de dieciséis pasajeros.');
        $license4->setStatus(true);
        $license4->setCreatedAt(new \DateTime());
        $license4->setUpdatedAt(new \DateTime());
        $manager->persist($license4);

        $license5 = new LicenseType();
        $license5->setName('E1: Transportes selectivos.');
        $license5->setStatus(true);
        $license5->setCreatedAt(new \DateTime());
        $license5->setUpdatedAt(new \DateTime());
        $manager->persist($license5);

        $license6 = new LicenseType();
        $license6->setName('E2: Autobuses con dieciséis ocupantes como máximo.');
        $license6->setStatus(true);
        $license6->setCreatedAt(new \DateTime());
        $license6->setUpdatedAt(new \DateTime());
        $manager->persist($license6);

        $license7 = new LicenseType();
        $license7->setName('E3: Autobuses con más de dieciséis ocupantes.');
        $license7->setStatus(true);
        $license7->setCreatedAt(new \DateTime());
        $license7->setUpdatedAt(new \DateTime());
        $manager->persist($license7);

        $license8 = new LicenseType();
        $license8->setName('F: Camiones de más de ocho toneladas y autobuses de más de dieciséis personas.');
        $license8->setStatus(true);
        $license8->setCreatedAt(new \DateTime());
        $license8->setUpdatedAt(new \DateTime());
        $manager->persist($license8);

        $license9 = new LicenseType();
        $license9->setName('I: Equipo pesado.');
        $license9->setStatus(true);
        $license9->setCreatedAt(new \DateTime());
        $license9->setUpdatedAt(new \DateTime());
        $manager->persist($license9);

        $license10 = new LicenseType();
        $license10->setName('G: Camiones combinados.');
        $license10->setStatus(true);
        $license10->setCreatedAt(new \DateTime());
        $license10->setUpdatedAt(new \DateTime());
        $manager->persist($license10);

        $license11 = new LicenseType();
        $license11->setName('H: Vehículos de transporte de carga que supone peligrosidad.');
        $license11->setStatus(true);
        $license11->setCreatedAt(new \DateTime());
        $license11->setUpdatedAt(new \DateTime());
        $manager->persist($license11);

        /**
         * Blood Type
         */

        $bloodType = new BloodType();
        $bloodType->setName('AB+');
        $bloodType->setStatus(true);
        $bloodType->setCreatedAt(new \DateTime());
        $bloodType->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType);

        $bloodType2 = new BloodType();
        $bloodType2->setName('AB-');
        $bloodType2->setStatus(true);
        $bloodType2->setCreatedAt(new \DateTime());
        $bloodType2->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType2);

        $bloodType3 = new BloodType();
        $bloodType3->setName('A+');
        $bloodType3->setStatus(true);
        $bloodType3->setCreatedAt(new \DateTime());
        $bloodType3->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType3);

        $bloodType4 = new BloodType();
        $bloodType4->setName('A-');
        $bloodType4->setStatus(true);
        $bloodType4->setCreatedAt(new \DateTime());
        $bloodType4->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType4);

        $bloodType5 = new BloodType();
        $bloodType5->setName('B+');
        $bloodType5->setStatus(true);
        $bloodType5->setCreatedAt(new \DateTime());
        $bloodType5->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType5);

        $bloodType6 = new BloodType();
        $bloodType6->setName('B-');
        $bloodType6->setStatus(true);
        $bloodType6->setCreatedAt(new \DateTime());
        $bloodType6->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType6);

        $bloodType7 = new BloodType();
        $bloodType7->setName('O+');
        $bloodType7->setStatus(true);
        $bloodType7->setCreatedAt(new \DateTime());
        $bloodType7->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType7);

        $bloodType8 = new BloodType();
        $bloodType8->setName('O-');
        $bloodType8->setStatus(true);
        $bloodType8->setCreatedAt(new \DateTime());
        $bloodType8->setUpdatedAt(new \DateTime());
        $manager->persist($bloodType8);

        /**
         * bank
         */

        $bank = new Bank();
        $bank->setName('Allbank Corp');
        $bank->setStatus(true);
        $bank->setCreatedAt(new \DateTime());
        $bank->setUpdatedAt(new \DateTime());
        $manager->persist($bank);

        $bank = new Bank();
        $bank->setName('BAC International Bank, Inc.');
        $bank->setStatus(true);
        $bank->setCreatedAt(new \DateTime());
        $bank->setUpdatedAt(new \DateTime());
        $manager->persist($bank);

        $bank = new Bank();
        $bank->setName('Balboa Bank & Trust Corp');
        $bank->setStatus(true);
        $bank->setCreatedAt(new \DateTime());
        $bank->setUpdatedAt(new \DateTime());
        $manager->persist($bank);

        $bank = new Bank();
        $bank->setName('Banco Aliado S.A.');
        $bank->setStatus(true);
        $bank->setCreatedAt(new \DateTime());
        $bank->setUpdatedAt(new \DateTime());
        $manager->persist($bank);

        $bank = new Bank();
        $bank->setName('Banco Azteca (Panamá), S.A.');
        $bank->setStatus(true);
        $bank->setCreatedAt(new \DateTime());
        $bank->setUpdatedAt(new \DateTime());
        $manager->persist($bank);

        /**
         * PlaceWork
         */

        $placeWork = new PlaceWork();
        $placeWork->setName('Colón');
        $placeWork->setAddress("Colón");
        $placeWork->setStatus(true);
        $placeWork->setCreatedAt(new \DateTime());
        $placeWork->setUpdatedAt(new \DateTime());
        $manager->persist($placeWork);

        $placeWork2 = new PlaceWork();
        $placeWork2->setName('Panamá');
        $placeWork2->setAddress("Panamá");
        $placeWork2->setStatus(true);
        $placeWork2->setCreatedAt(new \DateTime());
        $placeWork2->setUpdatedAt(new \DateTime());
        $manager->persist($placeWork2);

        /**
         * Gender
         */

        $gender = new Gender();
        $gender->setName('Masculino');
        $gender->setStatus(true);
        $gender->setCreatedAt(new \DateTime());
        $gender->setUpdatedAt(new \DateTime());
        $manager->persist($gender);

        $gender2 = new Gender();
        $gender2->setName('Femenino');
        $gender2->setStatus(true);
        $gender2->setCreatedAt(new \DateTime());
        $gender2->setUpdatedAt(new \DateTime());
        $manager->persist($gender2);

        $gender3 = new Gender();
        $gender3->setName('Otro');
        $gender3->setStatus(true);
        $gender3->setCreatedAt(new \DateTime());
        $gender3->setUpdatedAt(new \DateTime());
        $manager->persist($gender3);

        /**
         * Relationship
         */

        $relationship = new Relationship();
        $relationship->setName('Padre');
        $relationship->setStatus(true);
        $relationship->setCreatedAt(new \DateTime());
        $relationship->setUpdatedAt(new \DateTime());
        $manager->persist($relationship);

        $relationship2 = new Relationship();
        $relationship2->setName('Madre');
        $relationship2->setStatus(true);
        $relationship2->setCreatedAt(new \DateTime());
        $relationship2->setUpdatedAt(new \DateTime());
        $manager->persist($relationship2);

        $relationship3 = new Relationship();
        $relationship3->setName('Hermano (a)');
        $relationship3->setStatus(true);
        $relationship3->setCreatedAt(new \DateTime());
        $relationship3->setUpdatedAt(new \DateTime());
        $manager->persist($relationship3);

        $relationship4 = new Relationship();
        $relationship4->setName('Abuelo (a)');
        $relationship4->setStatus(true);
        $relationship4->setCreatedAt(new \DateTime());
        $relationship4->setUpdatedAt(new \DateTime());
        $manager->persist($relationship4);

        $relationship5 = new Relationship();
        $relationship5->setName('Tío (a)');
        $relationship5->setStatus(true);
        $relationship5->setCreatedAt(new \DateTime());
        $relationship5->setUpdatedAt(new \DateTime());
        $manager->persist($relationship5);

        $relationship6 = new Relationship();
        $relationship6->setName('Cónyuge');
        $relationship6->setStatus(true);
        $relationship6->setCreatedAt(new \DateTime());
        $relationship6->setUpdatedAt(new \DateTime());
        $manager->persist($relationship6);

        $relationship7 = new Relationship();
        $relationship7->setName('Hijo(a)');
        $relationship7->setStatus(true);
        $relationship7->setCreatedAt(new \DateTime());
        $relationship7->setUpdatedAt(new \DateTime());
        $manager->persist($relationship7);

        /**
         * AccountType
         */

        $accountType = new AccountType();
        $accountType->setName('Ahorro');
        $accountType->setStatus(true);
        $accountType->setCreatedAt(new \DateTime());
        $accountType->setUpdatedAt(new \DateTime());
        $manager->persist($accountType);

        $accountType2 = new AccountType();
        $accountType2->setName('Corriente');
        $accountType2->setStatus(true);
        $accountType2->setCreatedAt(new \DateTime());
        $accountType2->setUpdatedAt(new \DateTime());
        $manager->persist($accountType2);

        /**
         * Property Status
         */

        $propertyStatus = new PropertyStatus();
        $propertyStatus->setName('Propia');
        $propertyStatus->setStatus(true);
        $propertyStatus->setCreatedAt(new \DateTime());
        $propertyStatus->setUpdatedAt(new \DateTime());
        $manager->persist($propertyStatus);

        $propertyStatus2 = new PropertyStatus();
        $propertyStatus2->setName('Hipoteca');
        $propertyStatus2->setStatus(true);
        $propertyStatus2->setCreatedAt(new \DateTime());
        $propertyStatus2->setUpdatedAt(new \DateTime());
        $manager->persist($propertyStatus2);

        $propertyStatus3 = new PropertyStatus();
        $propertyStatus3->setName('Alquilada');
        $propertyStatus3->setStatus(true);
        $propertyStatus3->setCreatedAt(new \DateTime());
        $propertyStatus3->setUpdatedAt(new \DateTime());
        $manager->persist($propertyStatus3);

        /**
         * Language Level
         */

        $languageLevel = new LanguageLevel();
        $languageLevel->setName('Básico');
        $languageLevel->setStatus(true);
        $languageLevel->setCreatedAt(new \DateTime());
        $languageLevel->setUpdatedAt(new \DateTime());
        $manager->persist($languageLevel);

        $languageLevel2 = new LanguageLevel();
        $languageLevel2->setName('Intermedio');
        $languageLevel2->setStatus(true);
        $languageLevel2->setCreatedAt(new \DateTime());
        $languageLevel2->setUpdatedAt(new \DateTime());
        $manager->persist($languageLevel2);

        $languageLevel3 = new LanguageLevel();
        $languageLevel3->setName('Avanzado');
        $languageLevel3->setStatus(true);
        $languageLevel3->setCreatedAt(new \DateTime());
        $languageLevel3->setUpdatedAt(new \DateTime());
        $manager->persist($languageLevel3);



        $manager->flush();
    }
}
