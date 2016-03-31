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

CREATE TABLE users (
  id int(11) NOT NULL auto_increment,
  user_name varchar(100) NOT NULL,
  pass_word varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO [user] (username, password)
VALUES  ('samsonasik',  'e10adc3949ba59abbe56e057f20f883e');
