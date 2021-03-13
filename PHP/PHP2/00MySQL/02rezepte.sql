-- WIFI
-- Ulvi Ulu
-- ##############################################

CREATE TABLE rezepte (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  titel VARCHAR(190) NOT NULL,
  beschreibung TEXT NOT NULL,
  PRIMARY KEY (id),
  KEY titel (titel)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ##############################################
-- ##############################################

-- add new column benutzer_id 
ALTER TABLE rezepte ADD benutzer_id INT UNSIGNED NULL DEFAULT NULL AFTER ID, ADD INDEX (benutzer_id); 

-- add new relationship between benutzer and rezepte
ALTER TABLE rezepte ADD FOREIGN KEY (benutzer_id) REFERENCES benutzer(id) ON DELETE CASCADE ON UPDATE CASCADE; 

-- add new data to rezepte
INSERT INTO rezepte (id, benutzer_id, titel, beschreibung) VALUES (NULL, '2', 'Kaiserschmarrn', 'Testbeschreibung');

INSERT INTO rezepte (id, benutzer_id, titel, beschreibung) VALUES (NULL, '2', 'Omelette', 'Testbeschreibung');

-- ##############################################
-- ##############################################

SELECT * FROM rezepte;

-- WARNING!!!! deletes table
DROP TABLE rezepte;