<?php

$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
ALTER TABLE `proximity_client`
	CHANGE COLUMN `company_id` `client_id` INT(25) NOT NULL AUTO_INCREMENT FIRST;
SQLTEXT;

$installer->run($sql);
$installer->endSetup();