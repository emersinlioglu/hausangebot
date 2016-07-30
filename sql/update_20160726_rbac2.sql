ALTER TABLE `projekt` 
	DROP COLUMN `role`;

ALTER TABLE `projekt`
	ADD COLUMN `creator_user_id` INT(10) UNSIGNED NOT NULL AFTER `firma_id`;

UPDATE `projekt` SET `creator_user_id`=2 WHERE 1;

ALTER TABLE `datenblatt`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `auflassung`;

UPDATE `datenblatt` SET `creator_user_id`=2 WHERE 1;

ALTER TABLE `haus`
	ADD COLUMN `creator_user_id` INT UNSIGNED NOT NULL AFTER `tenummer`;

UPDATE `haus` SET `creator_user_id`=2 WHERE 1;


CREATE TABLE `projekt_user` (
	`projekt_id` INT UNSIGNED NOT NULL,
	`user_id` INT UNSIGNED NOT NULL
)
	COMMENT='Project user assignments'
	COLLATE='utf8_general_ci'
	ENGINE=InnoDB;
