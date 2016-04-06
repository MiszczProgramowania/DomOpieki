CREATE DATABASE DOM_OPIEKI;
USE DOM_OPIEKI;
-- ADMIN

CREATE TABLE user (
id int(5) unsigned NOT NULL AUTO_INCREMENT,
username varchar(32) NOT NULL,
password varchar(32) NOT NULL,
twitter varchar(32) DEFAULT NULL,
PRIMARY KEY (id),
KEY user_twitter (twitter)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- wygenerowano za pomoca md5

INSERT INTO `user` VALUES (1,'administrator','10f5425887f555a329a9071d88c535f6','dollyaswin');
-- NEWSY
CREATE TABLE news(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  PRIMARY KEY (id)
);

INSERT INTO news (title,description)
VALUES ('Testowy news1','Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1');
INSERT INTO news (title,description)
VALUES ('Testowy news2','Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2');
COMMIT

-- PODSTRONY
CREATE TABLE subsites(
  id INT NOT NULL auto_increment,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  PRIMARY KEY (id)
);

INSERT INTO subsites (title,description)
VALUES ('Testowy news1','Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1Opis testowego newsa 1');
INSERT INTO subsites (title,description)
VALUES ('Testowy news2','Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2Opis testowego newsa 2');
COMMIT