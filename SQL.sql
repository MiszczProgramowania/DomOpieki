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

DROP TABLE IF EXISTS `user`;
CREATE TABLE user (
id int(5) unsigned NOT NULL AUTO_INCREMENT,
username varchar(32) NOT NULL,
password varchar(32) NOT NULL,
twitter varchar(32) DEFAULT NULL,
PRIMARY KEY (id),
KEY user_twitter (twitter)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--
INSERT INTO `user` VALUES (1,'test123456','47ec2dd791e31e2ef2076caf64ed9b3d','dollyaswin');
