/**
	March 5th, 2011.	
	What? : Creates a fresh installation of the Missing Children Database (mc_db)
	When-to? : Intended to be used to setup a fresh database.	
	Notice: This script will wipeout all previous data, use with caution.	
**/

drop database if exists mc_db;
create database if not exists mc_db;

DROP user 'mc_db_user'@"%";
FLUSH PRIVILEGES;

create user 'mc_db_user'@"%" identified by 'mc_db_user_admin@123#';

grant ALL ON mc_db.* to 'mc_db_user'@"%" identified by 'mc_db_user_admin@123#';

# User and DB Created.

use mc_db;

CREATE TABLE status_catalog (
	status_id TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	status_name TINYTEXT NOT NULL ) 
	ENGINE=InnoDB;
	
## Catalog Data
INSERT INTO status_catalog(status_name) values 
('ORPHAN'),
('LOST');
## Catalog Data

CREATE TABLE child ( 
 name TINYTEXT NOT NULL,
 gender CHAR(1) NOT NULL,
 dob DATE,
 missing_since DATE,
 age TINYINT DEFAULT -1,
 photo_url VARCHAR(1024),
 child_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 salt BIGINT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE reporter (
 reporter_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 email VARCHAR(255) NOT NULL,
 name TINYTEXT NOT NULL,
 contact_number TINYTEXT,
 salt BIGINT NOT NULL,
 UNIQUE(email)
)ENGINE=InnoDB;

## Adding default Anonymous reporter
INSERT INTO reporter(email,name,contact_number,salt) values 
('nobody@anonymous.com','NOBODY','0000000000',1);
##

CREATE TABLE address (
 address_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 street TINYTEXT,locality TINYTEXT,city TINYTEXT,state TINYTEXT,
 country TINYTEXT,
 salt BIGINT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE preference (
	pref_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	pref_type INT,
	pref_text TINYTEXT
)ENGINE=InnoDB;
## Create preference
INSERT INTO preference(pref_type,pref_text) values
(1,'VOLUNTEER'),
(2,'CONTRIBUTE');
##

## Link tables
CREATE TABLE rel_reporter_child_address (
	rca_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rca_child_id INT NOT NULL,
	rca_address_id INT NOT NULL,
	rca_reporter_id INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE rel_child_status (
	rcs_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	rcs_child_id INT NOT NULL,
	rcs_status_id INT NOT NULL
)ENGINE=InnoDB;

CREATE TABLE child_misc_info (
	info_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	info_child_id INT NOT NULL,
	info_text TEXT NOT NULL
)ENGINE=InnoDB;

##
