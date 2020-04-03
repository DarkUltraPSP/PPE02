DROP DATABASE IF EXISTS PPE02;

CREATE DATABASE PPE02
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE PPE02;

CREATE TABLE Client
(
    idClient INT(11) AUTO_INCREMENT,
    nomClient VARCHAR(64),
    prenomClient VARCHAR(64),
    adresse VARCHAR(64),
    password VARCHAR(64),
    mail VARCHAR(64),
    PRIMARY KEY(idClient)
);

CREATE TABLE Commande
(
	idCommande INT(11) NOT NULL AUTO_INCREMENT,
	dateCommande DATETIME,
	quantite int,
	idClient int,
	PRIMARY KEY (idCommande)
);

CREATE TABLE ProduitCommande
(
	idProduit INT(11) NOT NULL,
	idCommande INT(11) NOT NULL,
	PRIMARY KEY (idProduit, idCommande)
);

CREATE TABLE Produit
(
	idProduit INT(11) NOT NULL AUTO_INCREMENT,
	nomProduit VARCHAR(64),
	prixProduit FLOAT,
	descriptionProduit LONGTEXT,
	pathPhoto VARCHAR(64),
	idTypeProduit INT,
	PRIMARY KEY (idProduit)
);

CREATE TABLE TypeProduit
(
	idTypeProduit INT(11) NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(64),
	PRIMARY KEY (idTypeProduit)
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

INSERT INTO TypeProduit (libelle) VALUES
("Tacos"),
("Viandes"),
("Sauces"),
("Boissons");

INSERT INTO Produit (nomProduit, prixProduit, idTypeProduit, descriptionProduit) VALUES
("Tacos M", "5", "1", " "),
("Tacos L", "7", "1", " "),
("Tacos XL", "9", "1", " "),
("Escalope de poulet", " ", "2", "De tendres escalopes de poulet"),
("Viande hachee", " ","2", "Une delicieuse viande de boeuf hachée"),
("Cordon bleu", " ","2", "Une tranche de jambon et du fromage prisoniers d'une savoureuse escalope de poulet panée"),
("Nuggets de poulet", " ","2", "Des nuggets de poulet frits a l'huile biologique"),
("Merguez", " ", "2", "Des merguez venant tout droit du boucher local"),
("Tenders", " ", "2", "Des morceaux de poulets enroulés d'une chapelure assaisonée au paprika, a la moutarde et au poivre"),
("Sauce Mayonaise", " ", "3", "Sauce a base d'huile, de jaune d'oeuf et de vinaigre"),
("Sauce Ketchup", " ", "3", "Sauce a base de tomates, de vinagre et de sucre"),
("Sauce Samouraï", " ", "3", "Sauce belge assez relevée a base de mayoannaise, de ketchup et de harissa"),
("Sauce Chili", " ", "3", "Sauce très relevée a base de tomate et de piment"),
("Sauce Barbecue", " ", "3", "Sauce a base de ketchup, de paprika, de miel, de sauce aigre-douce avec un zeste de piment"),
("Sauce Harissa", " ", "3", "Sauce très relevée a base de piment, d'ail, de coriande, de cumin et de gingembre"),
("Sauce Texane", " ", "3", "Sauce a base de ketchup, de bouillon de boeuf, de pimet doux, de paprika, de moutarde forte et d'ail"),
("Coca-cola", " ", "4", " "),
("Oasis", " ", "4", " "),
("Fanta", " ", "4", " "),
("Sprite", " ", "4", " "),
("Ice tea", " ", "4", " "),
("Eau", " ", "4", " ");

INSERT INTO Client (nomClient, prenomClient, adresse, password, mail) VALUES
("Cartman", "Eric", "SouthPark", "test", "cartmanlegros@gmail.com"),
("LeGaulois", "Obelix", "Bretagne", "test", "obelixlegros@gmail.com");

INSERT INTO Commande (dateCommande, quantite, idClient) VALUES
("2020-02-25 18:50:00", 2, 1),
("2020-02-25 18:50:00", 1, 2);