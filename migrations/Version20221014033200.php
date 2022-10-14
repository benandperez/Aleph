<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014033200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_family_nucleus (employees_id INT NOT NULL, family_nucleus_id INT NOT NULL, INDEX IDX_3619004E8520A30B (employees_id), INDEX IDX_3619004E3EA96A9F (family_nucleus_id), PRIMARY KEY(employees_id, family_nucleus_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_financial_profile (employees_id INT NOT NULL, financial_profile_id INT NOT NULL, INDEX IDX_95134FF68520A30B (employees_id), INDEX IDX_95134FF64998E291 (financial_profile_id), PRIMARY KEY(employees_id, financial_profile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_studies_currently (employees_id INT NOT NULL, studies_currently_id INT NOT NULL, INDEX IDX_80F260248520A30B (employees_id), INDEX IDX_80F26024284E959 (studies_currently_id), PRIMARY KEY(employees_id, studies_currently_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_education_level (employees_id INT NOT NULL, education_level_id INT NOT NULL, INDEX IDX_31ED55B68520A30B (employees_id), INDEX IDX_31ED55B6D7A5352E (education_level_id), PRIMARY KEY(employees_id, education_level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_language (employees_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_AAEABFC98520A30B (employees_id), INDEX IDX_AAEABFC982F1BAF4 (language_id), PRIMARY KEY(employees_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_working_information (employees_id INT NOT NULL, working_information_id INT NOT NULL, INDEX IDX_341BE6808520A30B (employees_id), INDEX IDX_341BE680176DAF8 (working_information_id), PRIMARY KEY(employees_id, working_information_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_vehicle_features (employees_id INT NOT NULL, vehicle_features_id INT NOT NULL, INDEX IDX_8CCB39288520A30B (employees_id), INDEX IDX_8CCB392840F3ED73 (vehicle_features_id), PRIMARY KEY(employees_id, vehicle_features_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_property (employees_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_F5C3D2A28520A30B (employees_id), INDEX IDX_F5C3D2A2549213EC (property_id), PRIMARY KEY(employees_id, property_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, corregimiento_id INT DEFAULT NULL, property_status_id INT DEFAULT NULL, country_id INT DEFAULT NULL, detail_property VARCHAR(50) DEFAULT NULL, distribution VARCHAR(50) DEFAULT NULL, INDEX IDX_8BF21CDEE946114A (province_id), INDEX IDX_8BF21CDEA02E9013 (corregimiento_id), INDEX IDX_8BF21CDE1A180200 (property_status_id), INDEX IDX_8BF21CDEF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEE946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA02E9013 FOREIGN KEY (corregimiento_id) REFERENCES corregimiento (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE1A180200 FOREIGN KEY (property_status_id) REFERENCES property_status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE account_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE bank ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE blood_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE company_department ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE company_position ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE corregimiento ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE district ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE document_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE education_level ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE education_level_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE employee_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE employees ADD image_profile VARCHAR(255) DEFAULT NULL, ADD employee_folder_name VARCHAR(255) DEFAULT NULL, ADD status TINYINT(1) NOT NULL, ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE family_nucleus ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE financial_profile ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE gender ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE language ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE language_level ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE license_type ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE marital_status ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE personal_references ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE place_work ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE property_status ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE province ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prueba ADD date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE relationship ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE roles ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE studies_currently ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD image_profile VARCHAR(255) DEFAULT NULL, ADD user_folder_name VARCHAR(255) DEFAULT NULL, ADD status TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE vehicle_features ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicle_types ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE working_information ADD created_at DATETIME DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEE946114A');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA02E9013');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE1A180200');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEF92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE employees_family_nucleus');
        $this->addSql('DROP TABLE employees_financial_profile');
        $this->addSql('DROP TABLE employees_studies_currently');
        $this->addSql('DROP TABLE employees_education_level');
        $this->addSql('DROP TABLE employees_language');
        $this->addSql('DROP TABLE employees_working_information');
        $this->addSql('DROP TABLE employees_vehicle_features');
        $this->addSql('DROP TABLE employees_property');
        $this->addSql('DROP TABLE property');
        $this->addSql('ALTER TABLE account_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bank DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE blood_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE company_department DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE company_position DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE corregimiento DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE district DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE document_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE education_level DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE education_level_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE employee_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE employees DROP image_profile, DROP employee_folder_name, DROP status, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE family_nucleus DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE financial_profile DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE gender DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE language DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE language_level DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE license_type DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE marital_status DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE personal_references DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE place_work DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE property_status DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE province DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE prueba DROP date');
        $this->addSql('ALTER TABLE relationship DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE roles DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE studies_currently DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE `user` DROP image_profile, DROP user_folder_name, DROP status');
        $this->addSql('ALTER TABLE vehicle_features DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE vehicle_types DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE working_information DROP created_at, DROP updated_at');
    }
}
