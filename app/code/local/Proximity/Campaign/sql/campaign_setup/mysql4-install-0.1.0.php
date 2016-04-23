<?php

$installer = $this;
$installer->startSetup();
$sql = <<<SQLTEXT
	CREATE TABLE `proximity_campaign` (
	`campaign_id` INT(50) NOT NULL AUTO_INCREMENT,
	`campaign_name` VARCHAR(50) NOT NULL,
	`campaign_description` TEXT NOT NULL,
	`category_id` INT(50) NOT NULL,
	`publish` TINYINT(5) NOT NULL,
	`publish_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`unpublish_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`created_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`updated_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`campaign_id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
SQLTEXT;

$installer->run($sql);
$installer->endSetup();
