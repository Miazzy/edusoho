<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140829165504 extends AbstractMigration
{
    public function up(Schema $schema)
    {
    	$this->addSql("ALTER TABLE `user` ALTER COLUMN `firstLogin` set default '1';");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
