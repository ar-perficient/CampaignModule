<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
CREATE TABLE `proximity_client` (
	`company_id` INT(25) NOT NULL AUTO_INCREMENT,
	`company_name` VARCHAR(50) NOT NULL,
	`company_email` VARCHAR(50) NOT NULL,
	`address` VARCHAR(255) NOT NULL,
	`country` VARCHAR(50) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`state` VARCHAR(50) NOT NULL,
	`zip` VARCHAR(50) NOT NULL,
	`lat` VARCHAR(50) NOT NULL,
	`lon` VARCHAR(50) NOT NULL,
	`beacon` VARCHAR(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`company_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;		
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 