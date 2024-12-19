

-- creation de database


CREATE DATABASE player;

-- reation de table playerinfornation


CREATE TABLE playerinfornation ( 
  playerID INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
  playerNAME VARCHAR(50) NOT NULL, 
  PhotoURL VARCHAR(255) NOT NULL, 
  Position VARCHAR(50) NOT NULL, 
  nationalityID INT NOT NULL , 
  nationalityID FOREIGN KEY (nationalityID) REFERENCES nationalityinformation(nationalityID) , 
  clubID INT NOT NULL ,  
  clubID FOREIGN KEY (clubID) REFERENCES clubinformation(clubID) , 
  PAC INT NOT NULL, 
  SHO INT NOT NULL, 
  PAS INT NOT NULL, 
  DRI INT NOT NULL, 
  DEF INT NOT NULL, 
  PHY INT NOT NULL, 
  Rating int NOT NULL );



-- reation de table clubinfornation

CREATE TABLE clubinfornation (
clubID int PRIMARY KEY AUTO_INCREMENT NOT NULL , 
clubNAME varchar(50) NOT NULL, 
clubURL varchar(255) NOT NULL );

-- reation de table nationalityinformation

CREATE TABLE nationalityinformation ( 
nationalityID int PRIMARY KEY AUTO_INCREMENT NOT NULL ,
nationalityNAME varchar(50) NOT NULL, 
nationalityURL varchar(255) NOT NULL );


