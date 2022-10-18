<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221018012825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achieved_goals (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, achieved_goals VARCHAR(255) DEFAULT NULL, reasons_achievement VARCHAR(255) DEFAULT NULL, INDEX IDX_D9CCF3118C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE self_appraisal (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT DEFAULT NULL, status TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE self_appraisal_achieved_goals (self_appraisal_id INT NOT NULL, achieved_goals_id INT NOT NULL, INDEX IDX_7ED9B46453E40 (self_appraisal_id), INDEX IDX_7ED9BD6E6304B (achieved_goals_id), PRIMARY KEY(self_appraisal_id, achieved_goals_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE self_appraisal_unfulfilled_goals (self_appraisal_id INT NOT NULL, unfulfilled_goals_id INT NOT NULL, INDEX IDX_68745FB846453E40 (self_appraisal_id), INDEX IDX_68745FB884A8E7AB (unfulfilled_goals_id), PRIMARY KEY(self_appraisal_id, unfulfilled_goals_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unfulfilled_goals (id INT AUTO_INCREMENT NOT NULL, employee_id INT DEFAULT NULL, unfulfilled_goals VARCHAR(255) DEFAULT NULL, reasons_for_non_achievement VARCHAR(255) DEFAULT NULL, INDEX IDX_5C21E5D08C03F15C (employee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achieved_goals ADD CONSTRAINT FK_D9CCF3118C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id)');
        $this->addSql('ALTER TABLE self_appraisal_achieved_goals ADD CONSTRAINT FK_7ED9B46453E40 FOREIGN KEY (self_appraisal_id) REFERENCES self_appraisal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE self_appraisal_achieved_goals ADD CONSTRAINT FK_7ED9BD6E6304B FOREIGN KEY (achieved_goals_id) REFERENCES achieved_goals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE self_appraisal_unfulfilled_goals ADD CONSTRAINT FK_68745FB846453E40 FOREIGN KEY (self_appraisal_id) REFERENCES self_appraisal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE self_appraisal_unfulfilled_goals ADD CONSTRAINT FK_68745FB884A8E7AB FOREIGN KEY (unfulfilled_goals_id) REFERENCES unfulfilled_goals (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE unfulfilled_goals ADD CONSTRAINT FK_5C21E5D08C03F15C FOREIGN KEY (employee_id) REFERENCES employees (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achieved_goals DROP FOREIGN KEY FK_D9CCF3118C03F15C');
        $this->addSql('ALTER TABLE self_appraisal_achieved_goals DROP FOREIGN KEY FK_7ED9B46453E40');
        $this->addSql('ALTER TABLE self_appraisal_achieved_goals DROP FOREIGN KEY FK_7ED9BD6E6304B');
        $this->addSql('ALTER TABLE self_appraisal_unfulfilled_goals DROP FOREIGN KEY FK_68745FB846453E40');
        $this->addSql('ALTER TABLE self_appraisal_unfulfilled_goals DROP FOREIGN KEY FK_68745FB884A8E7AB');
        $this->addSql('ALTER TABLE unfulfilled_goals DROP FOREIGN KEY FK_5C21E5D08C03F15C');
        $this->addSql('DROP TABLE achieved_goals');
        $this->addSql('DROP TABLE self_appraisal');
        $this->addSql('DROP TABLE self_appraisal_achieved_goals');
        $this->addSql('DROP TABLE self_appraisal_unfulfilled_goals');
        $this->addSql('DROP TABLE unfulfilled_goals');
    }
}
