<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170202173128 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE children_goods_subcategory_a (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_goods_size_number_a (id INT AUTO_INCREMENT NOT NULL, children_goods_id INT DEFAULT NULL, size_id INT DEFAULT NULL, INDEX IDX_2080A8F2A6916636 (children_goods_id), INDEX IDX_2080A8F2498DA827 (size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_a (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE description_goods_a (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE size_a (id INT AUTO_INCREMENT NOT NULL, size VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_goods_color_number_a (id INT AUTO_INCREMENT NOT NULL, children_goods_size_number_id INT DEFAULT NULL, color_id INT DEFAULT NULL, image_id INT DEFAULT NULL, number INT DEFAULT NULL, path VARCHAR(60) DEFAULT NULL, draft TINYINT(1) DEFAULT NULL, INDEX IDX_751832FA397D35C (children_goods_size_number_id), INDEX IDX_751832FA7ADA1FB5 (color_id), INDEX IDX_751832FA3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_goods_a (id INT AUTO_INCREMENT NOT NULL, children_goods_category_id INT DEFAULT NULL, children_goods_subcategory_id INT DEFAULT NULL, description_goods_id INT DEFAULT NULL, price_goods_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, position INT NOT NULL, prodDatetime DATETIME NOT NULL, prodDatetimeUpdate DATETIME NOT NULL, draft TINYINT(1) DEFAULT NULL, INDEX IDX_2C80A9D5A108AB08 (children_goods_category_id), INDEX IDX_2C80A9D5E1CB5670 (children_goods_subcategory_id), INDEX IDX_2C80A9D525BD7B1 (description_goods_id), INDEX IDX_2C80A9D5D5DE0E82 (price_goods_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_goods_a (id INT AUTO_INCREMENT NOT NULL, rub NUMERIC(8, 2) DEFAULT NULL, uah NUMERIC(8, 2) DEFAULT NULL, usd NUMERIC(8, 2) DEFAULT NULL, eur NUMERIC(8, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color_a (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_goods_category_a (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_D8898ED13DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE children_goods_category_children_goods_subcategory (children_goods_category_id INT NOT NULL, children_goods_subcategory_id INT NOT NULL, INDEX IDX_95F8406FA108AB08 (children_goods_category_id), INDEX IDX_95F8406FE1CB5670 (children_goods_subcategory_id), PRIMARY KEY(children_goods_category_id, children_goods_subcategory_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE a_buy_clients (id INT AUTO_INCREMENT NOT NULL, bag_register_id INT DEFAULT NULL, size VARCHAR(50) DEFAULT NULL, color VARCHAR(50) DEFAULT NULL, nid INT NOT NULL, priceone NUMERIC(8, 2) DEFAULT NULL, valuta VARCHAR(10) DEFAULT NULL, childrenGoods_id INT DEFAULT NULL, INDEX IDX_C78484EF3327FA23 (bag_register_id), INDEX IDX_C78484EFC20E4965 (childrenGoods_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE a_bag_register (id INT AUTO_INCREMENT NOT NULL, orderclient INT NOT NULL, name VARCHAR(50) DEFAULT NULL, city VARCHAR(30) DEFAULT NULL, tel VARCHAR(13) NOT NULL, email VARCHAR(30) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, prodDatetimeUpdate DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE children_goods_size_number_a ADD CONSTRAINT FK_2080A8F2A6916636 FOREIGN KEY (children_goods_id) REFERENCES children_goods_a (id)');
        $this->addSql('ALTER TABLE children_goods_size_number_a ADD CONSTRAINT FK_2080A8F2498DA827 FOREIGN KEY (size_id) REFERENCES size_a (id)');
        $this->addSql('ALTER TABLE children_goods_color_number_a ADD CONSTRAINT FK_751832FA397D35C FOREIGN KEY (children_goods_size_number_id) REFERENCES children_goods_size_number_a (id)');
        $this->addSql('ALTER TABLE children_goods_color_number_a ADD CONSTRAINT FK_751832FA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color_a (id)');
        $this->addSql('ALTER TABLE children_goods_color_number_a ADD CONSTRAINT FK_751832FA3DA5256D FOREIGN KEY (image_id) REFERENCES image_a (id)');
        $this->addSql('ALTER TABLE children_goods_a ADD CONSTRAINT FK_2C80A9D5A108AB08 FOREIGN KEY (children_goods_category_id) REFERENCES children_goods_category_a (id)');
        $this->addSql('ALTER TABLE children_goods_a ADD CONSTRAINT FK_2C80A9D5E1CB5670 FOREIGN KEY (children_goods_subcategory_id) REFERENCES children_goods_subcategory_a (id)');
        $this->addSql('ALTER TABLE children_goods_a ADD CONSTRAINT FK_2C80A9D525BD7B1 FOREIGN KEY (description_goods_id) REFERENCES description_goods_a (id)');
        $this->addSql('ALTER TABLE children_goods_a ADD CONSTRAINT FK_2C80A9D5D5DE0E82 FOREIGN KEY (price_goods_id) REFERENCES price_goods_a (id)');
        $this->addSql('ALTER TABLE children_goods_category_a ADD CONSTRAINT FK_D8898ED13DA5256D FOREIGN KEY (image_id) REFERENCES image_a (id)');
        $this->addSql('ALTER TABLE children_goods_category_children_goods_subcategory ADD CONSTRAINT FK_95F8406FA108AB08 FOREIGN KEY (children_goods_category_id) REFERENCES children_goods_category_a (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE children_goods_category_children_goods_subcategory ADD CONSTRAINT FK_95F8406FE1CB5670 FOREIGN KEY (children_goods_subcategory_id) REFERENCES children_goods_subcategory_a (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE a_buy_clients ADD CONSTRAINT FK_C78484EF3327FA23 FOREIGN KEY (bag_register_id) REFERENCES a_bag_register (id)');
        $this->addSql('ALTER TABLE a_buy_clients ADD CONSTRAINT FK_C78484EFC20E4965 FOREIGN KEY (childrenGoods_id) REFERENCES children_goods_a (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE children_goods_a DROP FOREIGN KEY FK_2C80A9D5E1CB5670');
        $this->addSql('ALTER TABLE children_goods_category_children_goods_subcategory DROP FOREIGN KEY FK_95F8406FE1CB5670');
        $this->addSql('ALTER TABLE children_goods_color_number_a DROP FOREIGN KEY FK_751832FA397D35C');
        $this->addSql('ALTER TABLE children_goods_color_number_a DROP FOREIGN KEY FK_751832FA3DA5256D');
        $this->addSql('ALTER TABLE children_goods_category_a DROP FOREIGN KEY FK_D8898ED13DA5256D');
        $this->addSql('ALTER TABLE children_goods_a DROP FOREIGN KEY FK_2C80A9D525BD7B1');
        $this->addSql('ALTER TABLE children_goods_size_number_a DROP FOREIGN KEY FK_2080A8F2498DA827');
        $this->addSql('ALTER TABLE children_goods_size_number_a DROP FOREIGN KEY FK_2080A8F2A6916636');
        $this->addSql('ALTER TABLE a_buy_clients DROP FOREIGN KEY FK_C78484EFC20E4965');
        $this->addSql('ALTER TABLE children_goods_a DROP FOREIGN KEY FK_2C80A9D5D5DE0E82');
        $this->addSql('ALTER TABLE children_goods_color_number_a DROP FOREIGN KEY FK_751832FA7ADA1FB5');
        $this->addSql('ALTER TABLE children_goods_a DROP FOREIGN KEY FK_2C80A9D5A108AB08');
        $this->addSql('ALTER TABLE children_goods_category_children_goods_subcategory DROP FOREIGN KEY FK_95F8406FA108AB08');
        $this->addSql('ALTER TABLE a_buy_clients DROP FOREIGN KEY FK_C78484EF3327FA23');
        $this->addSql('DROP TABLE children_goods_subcategory_a');
        $this->addSql('DROP TABLE children_goods_size_number_a');
        $this->addSql('DROP TABLE image_a');
        $this->addSql('DROP TABLE description_goods_a');
        $this->addSql('DROP TABLE size_a');
        $this->addSql('DROP TABLE children_goods_color_number_a');
        $this->addSql('DROP TABLE children_goods_a');
        $this->addSql('DROP TABLE price_goods_a');
        $this->addSql('DROP TABLE color_a');
        $this->addSql('DROP TABLE children_goods_category_a');
        $this->addSql('DROP TABLE children_goods_category_children_goods_subcategory');
        $this->addSql('DROP TABLE a_buy_clients');
        $this->addSql('DROP TABLE a_bag_register');
    }
}
