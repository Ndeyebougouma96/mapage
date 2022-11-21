CREATE DATABASE pages;
USE pages;
CREATE TABLE USER
( 
  ID int(11) NOT NULL,
  matricule varchar(80) NOT NULL,
  nom varchar(80) NOT NULL,
  prenom varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  roles varchar(255) NOT NULL,
  mot_de_passe varchar(255) CHARACTER SET utf8 NOT NULL,
  photo varchar(80) NOT NULL,
  date_inscription date,
  date_modification date,
  date_archivage date,
  archivage int(10) NOT NULL DEFAULT 0
) ;

