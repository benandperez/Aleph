<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013070032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bank ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE blood_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE company_department ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE company_position ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE corregimiento ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE district ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE document_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE education_level ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE education_level_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE employee_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE employees ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE family_nucleus ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE financial_profile ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE gender ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE language ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE language_level ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE license_type ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE marital_status ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE personal_references ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE place_work ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE property_status ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE province ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE relationship ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE roles ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE studies_currently ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vehicle_features ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vehicle_types ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE working_information ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
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
        $this->addSql('ALTER TABLE employees DROP created_at, DROP updated_at');
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
        $this->addSql('ALTER TABLE relationship DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE roles DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE studies_currently DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE vehicle_features DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE vehicle_types DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE working_information DROP created_at, DROP updated_at');
    }
}
