<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004061859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_financial_profile (employees_id INT NOT NULL, financial_profile_id INT NOT NULL, INDEX IDX_95134FF68520A30B (employees_id), INDEX IDX_95134FF64998E291 (financial_profile_id), PRIMARY KEY(employees_id, financial_profile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_financial_profile ADD CONSTRAINT FK_95134FF68520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_financial_profile ADD CONSTRAINT FK_95134FF64998E291 FOREIGN KEY (financial_profile_id) REFERENCES financial_profile (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_financial_profile DROP FOREIGN KEY FK_95134FF68520A30B');
        $this->addSql('ALTER TABLE employees_financial_profile DROP FOREIGN KEY FK_95134FF64998E291');
        $this->addSql('DROP TABLE employees_financial_profile');
    }
}
