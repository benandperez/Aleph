<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221013024702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employees_language (employees_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_AAEABFC98520A30B (employees_id), INDEX IDX_AAEABFC982F1BAF4 (language_id), PRIMARY KEY(employees_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employees_language ADD CONSTRAINT FK_AAEABFC98520A30B FOREIGN KEY (employees_id) REFERENCES employees (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employees_language ADD CONSTRAINT FK_AAEABFC982F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employees_language DROP FOREIGN KEY FK_AAEABFC98520A30B');
        $this->addSql('ALTER TABLE employees_language DROP FOREIGN KEY FK_AAEABFC982F1BAF4');
        $this->addSql('DROP TABLE employees_language');
    }
}
