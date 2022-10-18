<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018001951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_labor_information_aleph_group (employees_id INT NOT NULL, labor_information_aleph_group_id INT NOT NULL, INDEX IDX_704D08E38520A30B (employees_id), INDEX IDX_704D08E33F5415B4 (labor_information_aleph_group_id), PRIMARY KEY(employees_id, labor_information_aleph_group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE labor_information_aleph_group (id INT AUTO_INCREMENT NOT NULL, employee_type_id INT DEFAULT NULL, company_position_id INT DEFAULT NULL, company_department_id INT DEFAULT NULL, family_company TINYINT(1) DEFAULT NULL, family_company_text VARCHAR(50) DEFAULT NULL, date_joining_company DATETIME DEFAULT NULL, date_end_company DATETIME DEFAULT NULL, INDEX IDX_1A1B9F314500DA9C (employee_type_id), INDEX IDX_1A1B9F31C45596DE (company_position_id), INDEX IDX_1A1B9F31D2A2D7A2 (company_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE labor_information_aleph_group_place_work (labor_information_aleph_group_id INT NOT NULL, place_work_id INT NOT NULL, INDEX IDX_E01A5EE33F5415B4 (labor_information_aleph_group_id), INDEX IDX_E01A5EE38FF84420 (place_work_id), PRIMARY KEY(labor_information_aleph_group_id, place_work_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_labor_information_aleph_group ADD CONSTRAINT FK_704D08E38520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_labor_information_aleph_group ADD CONSTRAINT FK_704D08E33F5415B4 FOREIGN KEY (labor_information_aleph_group_id) REFERENCES labor_information_aleph_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F314500DA9C FOREIGN KEY (employee_type_id) REFERENCES employee_type (id)');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F31C45596DE FOREIGN KEY (company_position_id) REFERENCES company_position (id)');
        $this->addSql('ALTER TABLE labor_information_aleph_group ADD CONSTRAINT FK_1A1B9F31D2A2D7A2 FOREIGN KEY (company_department_id) REFERENCES company_department (id)');
        $this->addSql('ALTER TABLE labor_information_aleph_group_place_work ADD CONSTRAINT FK_E01A5EE33F5415B4 FOREIGN KEY (labor_information_aleph_group_id) REFERENCES labor_information_aleph_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE labor_information_aleph_group_place_work ADD CONSTRAINT FK_E01A5EE38FF84420 FOREIGN KEY (place_work_id) REFERENCES place_work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_place_work DROP FOREIGN KEY FK_66ADBF108FF84420');
        $this->addSql('ALTER TABLE employees_place_work DROP FOREIGN KEY FK_66ADBF108520A30B');
        $this->addSql('ALTER TABLE working_information_employees DROP FOREIGN KEY FK_4F9CA8938520A30B');
        $this->addSql('ALTER TABLE working_information_employees DROP FOREIGN KEY FK_4F9CA893176DAF8');
        $this->addSql('DROP TABLE employees_place_work');
        $this->addSql('DROP TABLE working_information_employees');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C3004500DA9C');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300C45596DE');
        $this->addSql('ALTER TABLE employees DROP FOREIGN KEY FK_BA82C300D2A2D7A2');
        $this->addSql('DROP INDEX IDX_BA82C3004500DA9C ON employees');
        $this->addSql('DROP INDEX IDX_BA82C300C45596DE ON employees');
        $this->addSql('DROP INDEX IDX_BA82C300D2A2D7A2 ON employees');
        $this->addSql('ALTER TABLE employees DROP company_position_id, DROP employee_type_id, DROP company_department_id, DROP family_company, DROP family_company_text, DROP date_joining_company');
        $this->addSql('ALTER TABLE working_information ADD direct_boss VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_place_work (employees_id INT NOT NULL, place_work_id INT NOT NULL, INDEX IDX_66ADBF108520A30B (employees_id), INDEX IDX_66ADBF108FF84420 (place_work_id), PRIMARY KEY(employees_id, place_work_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE working_information_employees (working_information_id INT NOT NULL, employees_id INT NOT NULL, INDEX IDX_4F9CA893176DAF8 (working_information_id), INDEX IDX_4F9CA8938520A30B (employees_id), PRIMARY KEY(working_information_id, employees_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE employees_place_work ADD CONSTRAINT FK_66ADBF108FF84420 FOREIGN KEY (place_work_id) REFERENCES place_work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_place_work ADD CONSTRAINT FK_66ADBF108520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE working_information_employees ADD CONSTRAINT FK_4F9CA8938520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE working_information_employees ADD CONSTRAINT FK_4F9CA893176DAF8 FOREIGN KEY (working_information_id) REFERENCES working_information (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_labor_information_aleph_group DROP FOREIGN KEY FK_704D08E38520A30B');
        $this->addSql('ALTER TABLE employees_labor_information_aleph_group DROP FOREIGN KEY FK_704D08E33F5415B4');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F314500DA9C');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F31C45596DE');
        $this->addSql('ALTER TABLE labor_information_aleph_group DROP FOREIGN KEY FK_1A1B9F31D2A2D7A2');
        $this->addSql('ALTER TABLE labor_information_aleph_group_place_work DROP FOREIGN KEY FK_E01A5EE33F5415B4');
        $this->addSql('ALTER TABLE labor_information_aleph_group_place_work DROP FOREIGN KEY FK_E01A5EE38FF84420');
        $this->addSql('DROP TABLE employees_labor_information_aleph_group');
        $this->addSql('DROP TABLE labor_information_aleph_group');
        $this->addSql('DROP TABLE labor_information_aleph_group_place_work');
        $this->addSql('ALTER TABLE employees ADD company_position_id INT DEFAULT NULL, ADD employee_type_id INT DEFAULT NULL, ADD company_department_id INT DEFAULT NULL, ADD family_company TINYINT(1) NOT NULL, ADD family_company_text VARCHAR(50) DEFAULT NULL, ADD date_joining_company DATE NOT NULL');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C3004500DA9C FOREIGN KEY (employee_type_id) REFERENCES employee_type (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300C45596DE FOREIGN KEY (company_position_id) REFERENCES company_position (id)');
        $this->addSql('ALTER TABLE employees ADD CONSTRAINT FK_BA82C300D2A2D7A2 FOREIGN KEY (company_department_id) REFERENCES company_department (id)');
        $this->addSql('CREATE INDEX IDX_BA82C3004500DA9C ON employees (employee_type_id)');
        $this->addSql('CREATE INDEX IDX_BA82C300C45596DE ON employees (company_position_id)');
        $this->addSql('CREATE INDEX IDX_BA82C300D2A2D7A2 ON employees (company_department_id)');
        $this->addSql('ALTER TABLE working_information DROP direct_boss');
    }
}
