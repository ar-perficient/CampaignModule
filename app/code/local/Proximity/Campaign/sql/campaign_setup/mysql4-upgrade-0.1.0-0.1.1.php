<?php

$installer = $this;
$installer->startSetup();
$sql = <<<SQLTEXT
    ALTER TABLE `proximity_campaign`
    CHANGE COLUMN `publish_at` `publish_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER `publish`,
    CHANGE COLUMN `unpublish_at` `unpublish_at` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER `publish_at`;


    ALTER TABLE `proximity_campaign`
    CHANGE COLUMN `publish_at` `publish_at` DATETIME NOT NULL AFTER `publish`,
    CHANGE COLUMN `unpublish_at` `unpublish_at` DATETIME NOT NULL AFTER `publish_at`;
SQLTEXT;

$installer->run($sql);
$installer->endSetup();
