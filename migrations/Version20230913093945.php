<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913093945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble ADD num_immeube LONGTEXT DEFAULT NULL, ADD nom_immeuble LONGTEXT DEFAULT NULL, ADD rue_immeuble LONGTEXT DEFAULT NULL, ADD cp_immeuble LONGTEXT DEFAULT NULL, ADD ville_immeuble LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble DROP num_immeube, DROP nom_immeuble, DROP rue_immeuble, DROP cp_immeuble, DROP ville_immeuble');
    }
}
