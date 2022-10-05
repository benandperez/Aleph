<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221005021640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_studies_currently (employees_id INT NOT NULL, studies_currently_id INT NOT NULL, INDEX IDX_80F260248520A30B (employees_id), INDEX IDX_80F26024284E959 (studies_currently_id), PRIMARY KEY(employees_id, studies_currently_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employees_education_level (employees_id INT NOT NULL, education_level_id INT NOT NULL, INDEX IDX_31ED55B68520A30B (employees_id), INDEX IDX_31ED55B6D7A5352E (education_level_id), PRIMARY KEY(employees_id, education_level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_studies_currently ADD CONSTRAINT FK_80F260248520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_studies_currently ADD CONSTRAINT FK_80F26024284E959 FOREIGN KEY (studies_currently_id) REFERENCES studies_currently (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_education_level ADD CONSTRAINT FK_31ED55B68520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_education_level ADD CONSTRAINT FK_31ED55B6D7A5352E FOREIGN KEY (education_level_id) REFERENCES education_level (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_studies_currently DROP FOREIGN KEY FK_80F260248520A30B');
        $this->addSql('ALTER TABLE employees_studies_currently DROP FOREIGN KEY FK_80F26024284E959');
        $this->addSql('ALTER TABLE employees_education_level DROP FOREIGN KEY FK_31ED55B68520A30B');
        $this->addSql('ALTER TABLE employees_education_level DROP FOREIGN KEY FK_31ED55B6D7A5352E');
        $this->addSql('DROP TABLE employees_studies_currently');
        $this->addSql('DROP TABLE employees_education_level');
    }
}
