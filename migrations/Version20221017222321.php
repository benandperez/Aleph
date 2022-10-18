<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017222321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blood_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_department (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE company_position (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE corregimiento (id INT AUTO_INCREMENT NOT NULL, district_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_982AF11BB08FA272 (district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_31C15487E946114A (province_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education_level (id INT AUTO_INCREMENT NOT NULL, education_level_type_id INT DEFAULT NULL, institution VARCHAR(50) DEFAULT NULL, title VARCHAR(50) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_2666D6B4BB87B52F (education_level_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education_level_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employee_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees (id INT AUTO_INCREMENT NOT NULL, document_type_id INT DEFAULT NULL, gender_id INT DEFAULT NULL, marital_status_id INT DEFAULT NULL, province_id INT DEFAULT NULL, corregimiento_id INT DEFAULT NULL, district_id INT DEFAULT NULL, license_type_id INT DEFAULT NULL, blood_type_id INT DEFAULT NULL, bank_id INT DEFAULT NULL, company_position_id INT DEFAULT NULL, employee_type_id INT DEFAULT NULL, company_department_id INT DEFAULT NULL, first_name VARCHAR(50) NOT NULL, second_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) NOT NULL, mother_last_name VARCHAR(50) DEFAULT NULL, married_last_name VARCHAR(50) DEFAULT NULL, document VARCHAR(50) NOT NULL, expiration_date DATE NOT NULL, birth_place VARCHAR(50) NOT NULL, nationality VARCHAR(50) NOT NULL, birth_day DATE NOT NULL, age INT NOT NULL, full_residence_address VARCHAR(100) NOT NULL, personal_email VARCHAR(20) DEFAULT NULL, residential_telephone VARCHAR(15) DEFAULT NULL, cell_phone VARCHAR(15) NOT NULL, expiration_date_license DATE DEFAULT NULL, has_own_car TINYINT(1) NOT NULL, in_case_of_emergency VARCHAR(50) DEFAULT NULL, family_phone_number VARCHAR(15) DEFAULT NULL, allergic TINYINT(1) NOT NULL, chronic_disease TINYINT(1) NOT NULL, allergic_yes VARCHAR(50) DEFAULT NULL, chronic_disease_yes VARCHAR(50) DEFAULT NULL, blood_donor TINYINT(1) NOT NULL, bank_account TINYINT(1) NOT NULL, account_number VARCHAR(50) DEFAULT NULL, sports_practice TINYINT(1) NOT NULL, what_sports VARCHAR(50) DEFAULT NULL, favorite_hobby VARCHAR(50) DEFAULT NULL, family_company TINYINT(1) NOT NULL, family_company_text VARCHAR(50) DEFAULT NULL, date_joining_company DATE NOT NULL, image_profile VARCHAR(255) DEFAULT NULL, employee_folder_name VARCHAR(255) DEFAULT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_BA82C30061232A4F (document_type_id), INDEX IDX_BA82C300708A0E0 (gender_id), INDEX IDX_BA82C300E559F9BF (marital_status_id), INDEX IDX_BA82C300E946114A (province_id), INDEX IDX_BA82C300A02E9013 (corregimiento_id), INDEX IDX_BA82C300B08FA272 (district_id), INDEX IDX_BA82C3002C55C7C8 (license_type_id), INDEX IDX_BA82C3007AEA5732 (blood_type_id), INDEX IDX_BA82C30011C8FB41 (bank_id), INDEX IDX_BA82C300C45596DE (company_position_id), INDEX IDX_BA82C3004500DA9C (employee_type_id), INDEX IDX_BA82C300D2A2D7A2 (company_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_place_work (employees_id INT NOT NULL, place_work_id INT NOT NULL, INDEX IDX_66ADBF108520A30B (employees_id), INDEX IDX_66ADBF108FF84420 (place_work_id), PRIMARY KEY(employees_id, place_work_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_personal_references (employees_id INT NOT NULL, personal_references_id INT NOT NULL, INDEX IDX_CD1023298520A30B (employees_id), INDEX IDX_CD102329F680466D (personal_references_id), PRIMARY KEY(employees_id, personal_references_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_family_nucleus (employees_id INT NOT NULL, family_nucleus_id INT NOT NULL, INDEX IDX_3619004E8520A30B (employees_id), INDEX IDX_3619004E3EA96A9F (family_nucleus_id), PRIMARY KEY(employees_id, family_nucleus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_financial_profile (employees_id INT NOT NULL, financial_profile_id INT NOT NULL, INDEX IDX_95134FF68520A30B (employees_id), INDEX IDX_95134FF64998E291 (financial_profile_id), PRIMARY KEY(employees_id, financial_profile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_studies_currently (employees_id INT NOT NULL, studies_currently_id INT NOT NULL, INDEX IDX_80F260248520A30B (employees_id), INDEX IDX_80F26024284E959 (studies_currently_id), PRIMARY KEY(employees_id, studies_currently_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_education_level (employees_id INT NOT NULL, education_level_id INT NOT NULL, INDEX IDX_31ED55B68520A30B (employees_id), INDEX IDX_31ED55B6D7A5352E (education_level_id), PRIMARY KEY(employees_id, education_level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_language (employees_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_AAEABFC98520A30B (employees_id), INDEX IDX_AAEABFC982F1BAF4 (language_id), PRIMARY KEY(employees_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_working_information (employees_id INT NOT NULL, working_information_id INT NOT NULL, INDEX IDX_341BE6808520A30B (employees_id), INDEX IDX_341BE680176DAF8 (working_information_id), PRIMARY KEY(employees_id, working_information_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_vehicle_features (employees_id INT NOT NULL, vehicle_features_id INT NOT NULL, INDEX IDX_8CCB39288520A30B (employees_id), INDEX IDX_8CCB392840F3ED73 (vehicle_features_id), PRIMARY KEY(employees_id, vehicle_features_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_property (employees_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_F5C3D2A28520A30B (employees_id), INDEX IDX_F5C3D2A2549213EC (property_id), PRIMARY KEY(employees_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE family_nucleus (id INT AUTO_INCREMENT NOT NULL, document_type_id INT DEFAULT NULL, gender_id INT DEFAULT NULL, relationship_id INT DEFAULT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(50) DEFAULT NULL, birth_day DATE DEFAULT NULL, age INT NOT NULL, occupation VARCHAR(100) DEFAULT NULL, first_name_spouse VARCHAR(50) DEFAULT NULL, second_name_spouse VARCHAR(50) DEFAULT NULL, last_name_spouse VARCHAR(50) DEFAULT NULL, mother_last_name_spouse VARCHAR(50) DEFAULT NULL, married_last_name_spouse VARCHAR(50) DEFAULT NULL, birth_day_spouse DATE DEFAULT NULL, age_spouse INT DEFAULT NULL, document_spouse VARCHAR(50) DEFAULT NULL, works TINYINT(1) DEFAULT NULL, work_place VARCHAR(100) DEFAULT NULL, job_performs VARCHAR(50) DEFAULT NULL, salary VARCHAR(50) DEFAULT NULL, time_spouse VARCHAR(50) DEFAULT NULL, dependent TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_A2441D061232A4F (document_type_id), INDEX IDX_A2441D0708A0E0 (gender_id), INDEX IDX_A2441D02C41D668 (relationship_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financial_profile (id INT AUTO_INCREMENT NOT NULL, account_type_id INT DEFAULT NULL, accounts TINYINT(1) NOT NULL, name VARCHAR(50) DEFAULT NULL, credit_balance VARCHAR(255) DEFAULT NULL, credit_card TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D394E865C6798DB (account_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, language_level_id INT DEFAULT NULL, language_level_written_id INT DEFAULT NULL, language VARCHAR(50) DEFAULT NULL, institution VARCHAR(50) DEFAULT NULL, certificate TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D4DB71B53313139D (language_level_id), INDEX IDX_D4DB71B556F4A489 (language_level_written_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, status TINYINT(1) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE license_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marital_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personal_references (id INT AUTO_INCREMENT NOT NULL, gender_id INT DEFAULT NULL, relationship_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, last_names VARCHAR(100) DEFAULT NULL, birth_day DATE DEFAULT NULL, ocupation VARCHAR(100) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_DFCE8A3C708A0E0 (gender_id), INDEX IDX_DFCE8A3C2C41D668 (relationship_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_work (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(255) DEFAULT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, corregimiento_id INT DEFAULT NULL, property_status_id INT DEFAULT NULL, country_id INT DEFAULT NULL, detail_property VARCHAR(50) DEFAULT NULL, distribution VARCHAR(50) DEFAULT NULL, INDEX IDX_8BF21CDEE946114A (province_id), INDEX IDX_8BF21CDEA02E9013 (corregimiento_id), INDEX IDX_8BF21CDE1A180200 (property_status_id), INDEX IDX_8BF21CDEF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property_status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE province (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prueba (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE relationship (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, role_name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studies_currently (id INT AUTO_INCREMENT NOT NULL, level VARCHAR(50) DEFAULT NULL, institution VARCHAR(50) DEFAULT NULL, title VARCHAR(50) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, image_profile VARCHAR(255) DEFAULT NULL, user_folder_name VARCHAR(255) DEFAULT NULL, status TINYINT(1) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_features (id INT AUTO_INCREMENT NOT NULL, vehicle_types_id INT DEFAULT NULL, plate_number VARCHAR(50) NOT NULL, model VARCHAR(50) DEFAULT NULL, year_production VARCHAR(50) DEFAULT NULL, mark VARCHAR(50) DEFAULT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_62D2D38753A03CC3 (vehicle_types_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_types (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE working_information (id INT AUTO_INCREMENT NOT NULL, since DATE DEFAULT NULL, until DATE DEFAULT NULL, business VARCHAR(50) DEFAULT NULL, position_held VARCHAR(50) DEFAULT NULL, reference_phone VARCHAR(50) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE corregimiento ADD CONSTRAINT FK_982AF11BB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C15487E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE education_level ADD CONSTRAINT FK_2666D6B4BB87B52F FOREIGN KEY (education_level_type_id) REFERENCES education_level_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C30061232A4F FOREIGN KEY (document_type_id) REFERENCES document_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300E559F9BF FOREIGN KEY (marital_status_id) REFERENCES marital_status (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300E946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300A02E9013 FOREIGN KEY (corregimiento_id) REFERENCES corregimiento (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C3002C55C7C8 FOREIGN KEY (license_type_id) REFERENCES license_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C3007AEA5732 FOREIGN KEY (blood_type_id) REFERENCES blood_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C30011C8FB41 FOREIGN KEY (bank_id) REFERENCES bank (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300C45596DE FOREIGN KEY (company_position_id) REFERENCES company_position (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C3004500DA9C FOREIGN KEY (employee_type_id) REFERENCES employee_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300D2A2D7A2 FOREIGN KEY (company_department_id) REFERENCES company_department (id)');
        $this->addSql('ALTER TABLE employees_place_work ADD CONSTRAINT FK_66ADBF108520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_place_work ADD CONSTRAINT FK_66ADBF108FF84420 FOREIGN KEY (place_work_id) REFERENCES place_work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_personal_references ADD CONSTRAINT FK_CD1023298520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_personal_references ADD CONSTRAINT FK_CD102329F680466D FOREIGN KEY (personal_references_id) REFERENCES personal_references (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_family_nucleus ADD CONSTRAINT FK_3619004E8520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_family_nucleus ADD CONSTRAINT FK_3619004E3EA96A9F FOREIGN KEY (family_nucleus_id) REFERENCES family_nucleus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_financial_profile ADD CONSTRAINT FK_95134FF68520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_financial_profile ADD CONSTRAINT FK_95134FF64998E291 FOREIGN KEY (financial_profile_id) REFERENCES financial_profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_studies_currently ADD CONSTRAINT FK_80F260248520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_studies_currently ADD CONSTRAINT FK_80F26024284E959 FOREIGN KEY (studies_currently_id) REFERENCES studies_currently (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_education_level ADD CONSTRAINT FK_31ED55B68520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_education_level ADD CONSTRAINT FK_31ED55B6D7A5352E FOREIGN KEY (education_level_id) REFERENCES education_level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_language ADD CONSTRAINT FK_AAEABFC98520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_language ADD CONSTRAINT FK_AAEABFC982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_working_information ADD CONSTRAINT FK_341BE6808520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_working_information ADD CONSTRAINT FK_341BE680176DAF8 FOREIGN KEY (working_information_id) REFERENCES working_information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_vehicle_features ADD CONSTRAINT FK_8CCB39288520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_vehicle_features ADD CONSTRAINT FK_8CCB392840F3ED73 FOREIGN KEY (vehicle_features_id) REFERENCES vehicle_features (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_property ADD CONSTRAINT FK_F5C3D2A28520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_property ADD CONSTRAINT FK_F5C3D2A2549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE family_nucleus ADD CONSTRAINT FK_A2441D061232A4F FOREIGN KEY (document_type_id) REFERENCES document_type (id)');
        $this->addSql('ALTER TABLE family_nucleus ADD CONSTRAINT FK_A2441D0708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE family_nucleus ADD CONSTRAINT FK_A2441D02C41D668 FOREIGN KEY (relationship_id) REFERENCES relationship (id)');
        $this->addSql('ALTER TABLE financial_profile ADD CONSTRAINT FK_D394E865C6798DB FOREIGN KEY (account_type_id) REFERENCES account_type (id)');
        $this->addSql('ALTER TABLE language ADD CONSTRAINT FK_D4DB71B53313139D FOREIGN KEY (language_level_id) REFERENCES language_level (id)');
        $this->addSql('ALTER TABLE language ADD CONSTRAINT FK_D4DB71B556F4A489 FOREIGN KEY (language_level_written_id) REFERENCES language_level (id)');
        $this->addSql('ALTER TABLE personal_references ADD CONSTRAINT FK_DFCE8A3C708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE personal_references ADD CONSTRAINT FK_DFCE8A3C2C41D668 FOREIGN KEY (relationship_id) REFERENCES relationship (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEE946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA02E9013 FOREIGN KEY (corregimiento_id) REFERENCES corregimiento (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE1A180200 FOREIGN KEY (property_status_id) REFERENCES property_status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE vehicle_features ADD CONSTRAINT FK_62D2D38753A03CC3 FOREIGN KEY (vehicle_types_id) REFERENCES vehicle_types (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE corregimiento DROP FOREIGN KEY FK_982AF11BB08FA272');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C15487E946114A');
        $this->addSql('ALTER TABLE education_level DROP FOREIGN KEY FK_2666D6B4BB87B52F');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C30061232A4F');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300708A0E0');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300E559F9BF');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300E946114A');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300A02E9013');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300B08FA272');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C3002C55C7C8');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C3007AEA5732');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C30011C8FB41');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300C45596DE');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C3004500DA9C');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300D2A2D7A2');
        $this->addSql('ALTER TABLE employees_place_work DROP FOREIGN KEY FK_66ADBF108520A30B');
        $this->addSql('ALTER TABLE employees_place_work DROP FOREIGN KEY FK_66ADBF108FF84420');
        $this->addSql('ALTER TABLE employees_personal_references DROP FOREIGN KEY FK_CD1023298520A30B');
        $this->addSql('ALTER TABLE employees_personal_references DROP FOREIGN KEY FK_CD102329F680466D');
        $this->addSql('ALTER TABLE employees_family_nucleus DROP FOREIGN KEY FK_3619004E8520A30B');
        $this->addSql('ALTER TABLE employees_family_nucleus DROP FOREIGN KEY FK_3619004E3EA96A9F');
        $this->addSql('ALTER TABLE employees_financial_profile DROP FOREIGN KEY FK_95134FF68520A30B');
        $this->addSql('ALTER TABLE employees_financial_profile DROP FOREIGN KEY FK_95134FF64998E291');
        $this->addSql('ALTER TABLE employees_studies_currently DROP FOREIGN KEY FK_80F260248520A30B');
        $this->addSql('ALTER TABLE employees_studies_currently DROP FOREIGN KEY FK_80F26024284E959');
        $this->addSql('ALTER TABLE employees_education_level DROP FOREIGN KEY FK_31ED55B68520A30B');
        $this->addSql('ALTER TABLE employees_education_level DROP FOREIGN KEY FK_31ED55B6D7A5352E');
        $this->addSql('ALTER TABLE employees_language DROP FOREIGN KEY FK_AAEABFC98520A30B');
        $this->addSql('ALTER TABLE employees_language DROP FOREIGN KEY FK_AAEABFC982F1BAF4');
        $this->addSql('ALTER TABLE employees_working_information DROP FOREIGN KEY FK_341BE6808520A30B');
        $this->addSql('ALTER TABLE employees_working_information DROP FOREIGN KEY FK_341BE680176DAF8');
        $this->addSql('ALTER TABLE employees_vehicle_features DROP FOREIGN KEY FK_8CCB39288520A30B');
        $this->addSql('ALTER TABLE employees_vehicle_features DROP FOREIGN KEY FK_8CCB392840F3ED73');
        $this->addSql('ALTER TABLE employees_property DROP FOREIGN KEY FK_F5C3D2A28520A30B');
        $this->addSql('ALTER TABLE employees_property DROP FOREIGN KEY FK_F5C3D2A2549213EC');
        $this->addSql('ALTER TABLE family_nucleus DROP FOREIGN KEY FK_A2441D061232A4F');
        $this->addSql('ALTER TABLE family_nucleus DROP FOREIGN KEY FK_A2441D0708A0E0');
        $this->addSql('ALTER TABLE family_nucleus DROP FOREIGN KEY FK_A2441D02C41D668');
        $this->addSql('ALTER TABLE financial_profile DROP FOREIGN KEY FK_D394E865C6798DB');
        $this->addSql('ALTER TABLE language DROP FOREIGN KEY FK_D4DB71B53313139D');
        $this->addSql('ALTER TABLE language DROP FOREIGN KEY FK_D4DB71B556F4A489');
        $this->addSql('ALTER TABLE personal_references DROP FOREIGN KEY FK_DFCE8A3C708A0E0');
        $this->addSql('ALTER TABLE personal_references DROP FOREIGN KEY FK_DFCE8A3C2C41D668');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEE946114A');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA02E9013');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE1A180200');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEF92F3E70');
        $this->addSql('ALTER TABLE vehicle_features DROP FOREIGN KEY FK_62D2D38753A03CC3');
        $this->addSql('DROP TABLE account_type');
        $this->addSql('DROP TABLE bank');
        $this->addSql('DROP TABLE blood_type');
        $this->addSql('DROP TABLE company_department');
        $this->addSql('DROP TABLE company_position');
        $this->addSql('DROP TABLE corregimiento');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE document_type');
        $this->addSql('DROP TABLE education_level');
        $this->addSql('DROP TABLE education_level_type');
        $this->addSql('DROP TABLE employee_type');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE employees_place_work');
        $this->addSql('DROP TABLE employees_personal_references');
        $this->addSql('DROP TABLE employees_family_nucleus');
        $this->addSql('DROP TABLE employees_financial_profile');
        $this->addSql('DROP TABLE employees_studies_currently');
        $this->addSql('DROP TABLE employees_education_level');
        $this->addSql('DROP TABLE employees_language');
        $this->addSql('DROP TABLE employees_working_information');
        $this->addSql('DROP TABLE employees_vehicle_features');
        $this->addSql('DROP TABLE employees_property');
        $this->addSql('DROP TABLE family_nucleus');
        $this->addSql('DROP TABLE financial_profile');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_level');
        $this->addSql('DROP TABLE license_type');
        $this->addSql('DROP TABLE marital_status');
        $this->addSql('DROP TABLE personal_references');
        $this->addSql('DROP TABLE place_work');
        $this->addSql('DROP TABLE property');
        $this->addSql('DROP TABLE property_status');
        $this->addSql('DROP TABLE province');
        $this->addSql('DROP TABLE prueba');
        $this->addSql('DROP TABLE relationship');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE studies_currently');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE vehicle_features');
        $this->addSql('DROP TABLE vehicle_types');
        $this->addSql('DROP TABLE working_information');
    }
}
