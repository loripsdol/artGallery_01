<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320154329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'First migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(128) DEFAULT NULL, lastname VARCHAR(255) NOT NULL, email_priv VARCHAR(255) DEFAULT NULL, email_pub VARCHAR(255) DEFAULT NULL, port VARCHAR(32) DEFAULT NULL, phone VARCHAR(32) DEFAULT NULL, url_site VARCHAR(255) DEFAULT NULL, bio LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, misc LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_expo (artist_id INT NOT NULL, expo_id INT NOT NULL, INDEX IDX_39D26265B7970CF8 (artist_id), INDEX IDX_39D26265A0042828 (expo_id), PRIMARY KEY(artist_id, expo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expo (id INT AUTO_INCREMENT NOT NULL, url_expo_image VARCHAR(255) DEFAULT NULL, expo_text LONGTEXT DEFAULT NULL, title VARCHAR(255) NOT NULL, start_date VARCHAR(32) NOT NULL, end_date VARCHAR(32) DEFAULT NULL, year1 VARCHAR(4) NOT NULL, year2 VARCHAR(4) DEFAULT NULL, slug VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', misc LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expo_image (expo_id INT NOT NULL, image_id INT NOT NULL, INDEX IDX_B0562273A0042828 (expo_id), INDEX IDX_B05622733DA5256D (image_id), PRIMARY KEY(expo_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, artist_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, year VARCHAR(4) DEFAULT NULL, INDEX IDX_C53D045FB7970CF8 (artist_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_expo ADD CONSTRAINT FK_39D26265B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_expo ADD CONSTRAINT FK_39D26265A0042828 FOREIGN KEY (expo_id) REFERENCES expo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expo_image ADD CONSTRAINT FK_B0562273A0042828 FOREIGN KEY (expo_id) REFERENCES expo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE expo_image ADD CONSTRAINT FK_B05622733DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist_expo DROP FOREIGN KEY FK_39D26265B7970CF8');
        $this->addSql('ALTER TABLE artist_expo DROP FOREIGN KEY FK_39D26265A0042828');
        $this->addSql('ALTER TABLE expo_image DROP FOREIGN KEY FK_B0562273A0042828');
        $this->addSql('ALTER TABLE expo_image DROP FOREIGN KEY FK_B05622733DA5256D');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FB7970CF8');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_expo');
        $this->addSql('DROP TABLE expo');
        $this->addSql('DROP TABLE expo_image');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
