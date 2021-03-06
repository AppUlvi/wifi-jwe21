-- WIFI
-- Ulvi Ulu
-- ##############################################

CREATE TABLE zutaten (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  titel VARCHAR(190) NOT NULL,
  kcal_pro_100 DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY titel (titel)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ##############################################
-- ##############################################

INSERT INTO zutaten (titel) VALUES ('Milch');
INSERT INTO zutaten (titel) VALUES ('Eier');
INSERT INTO zutaten (titel) VALUES ('Mehl');
INSERT INTO zutaten (titel) VALUES ('Zucker');

-- ##############################################
-- ##############################################

SELECT * FROM zutaten;

-- WARNING!!!! deletes table
DROP TABLE zutaten;