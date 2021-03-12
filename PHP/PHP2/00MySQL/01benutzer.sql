-- WIFI
-- Ulvi Ulu
-- ##############################################

-- creates table benutzer
CREATE TABLE benutzer (
  id INT UNSIGNED NOT NULL,
  benutzername VARCHAR(190) NOT NULL,
  email VARCHAR(190) NOT NULL,
  passwort VARCHAR(190) NOT NULL,
  -- sets primary key to id (unique identifier)
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ##############################################
-- ##############################################

-- Insert data into benutzer
INSERT INTO benutzer (id, benutzername, email, passwort) VALUES ('1', 'Alpha', 'alpha@alp.ha', 'alpha');
INSERT INTO benutzer (id, benutzername, email, passwort) VALUES ('2', 'Beta', 'beta@be.ta', 'beta');
INSERT INTO benutzer (id, benutzername, email, passwort) VALUES ('3', 'Gamma', 'gamma@gam.ma', 'gamma');

-- updates email from benutzer with id: 2
UPDATE benutzer SET email = 'lambda@be.ta' WHERE benutzer.id = 2; 

-- deletes row from benutzer with id: 3
DELETE FROM benutzer WHERE benutzer.id = 3; 

-- inserts new data
INSERT INTO benutzer (id, benutzername, email, passwort) VALUES ('4', 'Sigma', 'sigma@sig.ma', 'sigma');

-- selects columns benutzername and email and sorts it descending (id)
SELECT benutzername, email FROM benutzer ORDER BY id DESC;

-- adds auto_increment to id
ALTER TABLE benutzer CHANGE id id INT UNSIGNED NOT NULL AUTO_INCREMENT;

-- adds unique to benutzername
ALTER TABLE benutzer ADD UNIQUE (benutzername);

-- adds index to email
ALTER TABLE benutzer ADD INDEX(email); 

-- inserts new data to benutzer with auto id
INSERT INTO benutzer (benutzername, email, passwort) VALUES ('Lambda', 'lambda@lamb.da', 'lambda');
INSERT INTO benutzer (id, benutzername, email, passwort) VALUES (NULL, 'Kappa', 'kappa@kap.pa', 'kappa');

-- selects with a condition
SELECT * FROM benutzer WHERE benutzername = 'Lambda';

-- update passwort from benutzer Alpha
UPDATE benutzer SET passwort = '$2y$10$NEDwI7TRZdOXqUmpNULVOOQm4KkkIJODSU3V9cJ7hCQemLlMaPDyu' WHERE benutzer.id = 1; 

-- add letztes_login and anzahl_logins to benutzer
ALTER TABLE benutzer ADD letztes_login DATETIME NULL DEFAULT NULL AFTER passwort;

ALTER TABLE benutzer ADD anzahl_logins INT UNSIGNED NOT NULL DEFAULT 0 AFTER letztes_login;

-- ##############################################
-- ##############################################

-- selects and shows benutzer table
SELECT * FROM benutzer;

-- WARNING!!!! deletes table
DROP TABLE benutzer;