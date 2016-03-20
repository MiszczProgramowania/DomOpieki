CREATE DATABASE DOM_OPIEKI;
USE DOM_OPIEKI;
CREATE TABLE news(
  id INT NOT NULL auto_increment,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  PRIMARY KEY (id)
);

INSERT INTO news (title,description)
    VALUES ('Testowy news1','Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1');
INSERT INTO news (title,description)
VALUES ('Testowy news2','Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2');
COMMIT

SELECT * FROM news;

/*tutorial*/
CREATE TABLE album (
  id int(11) NOT NULL auto_increment,
  artist varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO album (artist, title)
VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO album (artist, title)
VALUES  ('Adele',  '21');
INSERT INTO album (artist, title)
VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO album (artist, title)
VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO album (artist, title)
VALUES  ('Gotye',  'Making  Mirrors');