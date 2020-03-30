DROP DATABASE IF EXISTS PPE02;

CREATE DATABASE PPE02
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE DATABASE PPE02;

CREATE TABLE Client
(
    idClient INT(11) NOT NULL,
    nomClient VARCHAR(64),
    prenomClient VARCHAR(64),
    adresse VARCHAR(64),
    password VARCHAR(64),
    mail VARCHAR(64),
    PRIMARY KEY(idClient)
);

CREATE TABLE Commande
(
	idCommande INT(11) NOT NULL,
	dateCommande DATE,
	PRIMARY KEY(idCommande)
);

CREATE TABLE Produit_Commande
(
	idProduit INT(11) NOT NULL,
	idCommande INT(11) NOT NULL
);

CREATE TABLE Produit
(
	idProduit INT(11) NOT NULL,
	nomProduit VARCHAR(64),
	prixProduit FLOAT,
	PRIMARY KEY(idProduit)
);

CREATE TABLE ProduitType
(
	idProduit INT(11) NOT NULL,
	idTypeProduit INT(11) NOT NULL
);

CREATE TABLE TypeProduit
(
	idTypeProduit INT(11) NOT NULL,
	libelle VARCHAR(64),
	PRIMARY KEY(idTypeProduit)
);

CREATE TABLE Ingredient
(
	idIngredient INT(11) NOT NULL,
	nomIngredient VARCHAR(64),
	PRIMARY KEY(idIngredient)
);

ALTER TABLE Commande
ADD CONSTRAINT Commande_idClient
FOREIGN KEY (idClient)
REFERENCES Client(idClient);

ALTER TABLE Produit 
ADD CONSTRAINT Produit_idTypeProduit
FOREIGN KEY (idTypeProduit)
REFERENCES TypeProduit(idTypeProduit);

ALTER TABLE ProduitCommande
ADD CONSTRAINT ProduitCommande_idProduit
FOREIGN KEY (idProduit)
REFERENCES Produit(idProduit);

ALTER TABLE ProduitCommande
ADD CONSTRAINT ProduitCommande_idCommande
FOREIGN KEY (idCommande)
REFERENCES Commande(idCommande);

ALTER TABLE IngredientProduit
ADD CONSTRAINT IngredientProduit_idProduit
FOREIGN KEY (idProduit)
REFERENCES Produit(idProduit);

ALTER TABLE IngredientProduit
ADD CONSTRAINT IngredientProduit_idIngredient
FOREIGN KEY (idIngredient)
REFERENCES Ingredient(idIngredient);


