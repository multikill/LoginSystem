DROP DATABASE IF EXISTS loginsystem;

CREATE DATABASE loginsystem;

USE loginsystem;

CREATE TABLE loginsystem.tbl_users ( 
	user_id 	INT 			NOT NULL AUTO_INCREMENT , 
	username 	VARCHAR(50) 	NOT NULL , 
	email 		VARCHAR(80) 	NOT NULL , 
	hwid 		VARCHAR(120) 	NOT NULL , 
	password 	VARCHAR(120) 	NOT NULL , 
	status 		INT 			NOT NULL DEFAULT '1' , 
	PRIMARY KEY (user_id)
) 