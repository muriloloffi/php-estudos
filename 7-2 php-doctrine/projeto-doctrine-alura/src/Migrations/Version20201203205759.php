<?php

declare(strict_types=1);

namespace Muriloloffi\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203205759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, phoneNumber VARCHAR(255) NOT NULL, student_id_FK INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_858EB8D94EBEE2FE ON Phone (student_id_FK)');
        $this->addSql('CREATE TABLE Student (student_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, studentName VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Phone');
        $this->addSql('DROP TABLE Student');
    }
}
