-- CREATE DATABASE hmiza;
-- USE DATABASE hmiza;

CREATE TABLE Produits(
produit_id int PRIMARY KEY AUTO_INCREMENT,
produit_nom varchar(200) not null,
produit_description varchar(200) not null,
produit_categorie varchar(200) not null,
produit_souscategorie varchar(200) not null,
produit_souscategorie2 varchar(200) not null,
produit_img varchar(200) NOT NULL
),

CREATE TABLE Business(
business_id int PRIMARY KEY AUTO_INCREMENT,
business_nom varchar(200) not null,
business_profileImage varchar(200) not null,
business_email varchar(200) not null,
business_password varchar(200) not null,
business_location varchar(200) not null,
business_adresse varchar(200) not null,
business_profession varchar(200) not null,
business_sousprofession varchar(200) not null,
business_description varchar(200) not null

),

CREATE TABLE Produit_Business(
id int PRIMARY KEY AUTO_INCREMENT,
produit_id int NOT NULL,
business_id int NOT NULL,
FOREIGN KEY (produit_id) REFERENCES Produit(produit_id),
FOREIGN KEY (business_id) REFERENCES Business(business_id),
produit_prix int not null,
produit_note int not null,
published_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
),

CREATE TABLE Utilisateur(
id int PRIMARY KEY AUTO_INCREMENT,
nom varchar(200) NOT NULL,
prenom varchar(200) NOT NULL,
email varchar(200) NOT NULL,
password varchar(200) NOT NULL,
img varchar(200) NOT NULL,
),

CREATE TABLE Review(
id int PRIMARY KEY AUTO_INCREMENT,
titre varchar(200) not null,
description varchar(200) not null,
note int not null,
produit_business_id int NOT NULL,
utilisateur_id int NOT NULL,
FOREIGN KEY(produit_business_id) REFERENCES Produit_Business(id),
FOREIGN KEY(utilisateur_id) REFERENCES Utilisateur(id),
published_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
),
