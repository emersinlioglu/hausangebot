-- Güncelleme icin unutma !!!
-- bundan sonra asagidaki linki calistir.
-- http://hausangebot.local/index.php?r=kaeufer%2Fupdatedates

ALTER TABLE `datenblatt`
  ADD COLUMN `beurkundung_am` DATE NULL DEFAULT NULL AFTER `aktiv`,
  ADD COLUMN `verbindliche_fertigstellung` DATE NULL DEFAULT NULL AFTER `beurkundung_am`,
  ADD COLUMN `uebergang_bnl` DATE NULL DEFAULT NULL AFTER `verbindliche_fertigstellung`,
  ADD COLUMN `abnahme_se` DATE NULL DEFAULT NULL AFTER `uebergang_bnl`,
  ADD COLUMN `abnahme_ge` DATE NULL DEFAULT NULL AFTER `abnahme_se`,
  ADD COLUMN `auflassung` TINYINT(1) NULL DEFAULT 0 AFTER `abnahme_ge`;