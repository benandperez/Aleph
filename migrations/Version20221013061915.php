<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013061915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_working_information (employees_id INT NOT NULL, working_information_id INT NOT NULL, INDEX IDX_341BE6808520A30B (employees_id), INDEX IDX_341BE680176DAF8 (working_information_id), PRIMARY KEY(employees_id, working_information_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_vehicle_features (employees_id INT NOT NULL, vehicle_features_id INT NOT NULL, INDEX IDX_8CCB39288520A30B (employees_id), INDEX IDX_8CCB392840F3ED73 (vehicle_features_id), PRIMARY KEY(employees_id, vehicle_features_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE property (id INT AUTO_INCREMENT NOT NULL, province_id INT DEFAULT NULL, corregimiento_id INT DEFAULT NULL, property_status_id INT DEFAULT NULL, country_id INT DEFAULT NULL, detail_property VARCHAR(50) DEFAULT NULL, distribution VARCHAR(50) DEFAULT NULL, INDEX IDX_8BF21CDEE946114A (province_id), INDEX IDX_8BF21CDEA02E9013 (corregimiento_id), INDEX IDX_8BF21CDE1A180200 (property_status_id), INDEX IDX_8BF21CDEF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_working_information ADD CONSTRAINT FK_341BE6808520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_working_information ADD CONSTRAINT FK_341BE680176DAF8 FOREIGN KEY (working_information_id) REFERENCES working_information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_vehicle_features ADD CONSTRAINT FK_8CCB39288520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_vehicle_features ADD CONSTRAINT FK_8CCB392840F3ED73 FOREIGN KEY (vehicle_features_id) REFERENCES vehicle_features (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEE946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEA02E9013 FOREIGN KEY (corregimiento_id) REFERENCES corregimiento (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE1A180200 FOREIGN KEY (property_status_id) REFERENCES property_status (id)');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDEF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_working_information DROP FOREIGN KEY FK_341BE6808520A30B');
        $this->addSql('ALTER TABLE employees_working_information DROP FOREIGN KEY FK_341BE680176DAF8');
        $this->addSql('ALTER TABLE employees_vehicle_features DROP FOREIGN KEY FK_8CCB39288520A30B');
        $this->addSql('ALTER TABLE employees_vehicle_features DROP FOREIGN KEY FK_8CCB392840F3ED73');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEE946114A');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEA02E9013');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE1A180200');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDEF92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE employees_working_information');
        $this->addSql('DROP TABLE employees_vehicle_features');
        $this->addSql('DROP TABLE property');
    }
}
