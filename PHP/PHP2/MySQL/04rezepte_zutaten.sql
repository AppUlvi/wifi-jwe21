-- WIFI
-- Ulvi Ulu
-- ##############################################

CREATE TABLE rezepte_zutaten (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  rezepte_id INT UNSIGNED NULL DEFAULT NULL,
  zutaten_id INT UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ##############################################
-- ##############################################

-- add new relationships to rezepte_zutaten
ALTER TABLE rezepte_zutaten ADD FOREIGN KEY (rezepte_id) REFERENCES rezepte(id) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE rezepte_zutaten ADD FOREIGN KEY (zutaten_id) REFERENCES zutaten(id) ON DELETE RESTRICT ON UPDATE CASCADE; 

-- add new columns to rezepte_zutaten
ALTER TABLE rezepte_zutaten ADD menge DECIMAL(10, 2) NULL DEFAULT NULL AFTER zutaten_id; 
ALTER TABLE rezepte_zutaten ADD einheit VARCHAR(190) NULL DEFAULT NULL zutaten_id; 

-- insert new data to rezepte_zutaten
INSERT INTO rezepte_zutaten (rezepte_id, zutaten_id) VALUES (1, 3);
INSERT INTO rezepte_zutaten (rezepte_id, zutaten_id) VALUES (1, 2);

-- update menge and einheit in rezepte_zutaten
UPDATE rezepte_zutaten SET menge = '500' WHERE rezepte_zutaten.id = 1; 
UPDATE rezepte_zutaten SET menge = '3' WHERE rezepte_zutaten.id = 2; 
UPDATE rezepte_zutaten SET einheit = 'Gramm' WHERE rezepte_zutaten.id = 1; 
UPDATE rezepte_zutaten SET einheit = 'Stück' WHERE rezepte_zutaten.id = 2; 


-- ##############################################
-- ##############################################

SELECT * FROM rezepte_zutaten;

-- WARNING!!!! deletes table
DROP TABLE rezepte_zutaten;