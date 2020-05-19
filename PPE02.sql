DROP DATABASE IF EXISTS PPE02;

CREATE DATABASE PPE02
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE PPE02;

CREATE TABLE Frites
(
	idFrites INT AUTO_INCREMENT,
	nomFrites VARCHAR (64),
	prixFrites FLOAT,
	PRIMARY KEY (idFrites)
);

CREATE TABLE FritesPanier
(
	idFrites INT,
	idPanier INT,
	quantite INT,
	PRIMARY KEY (idFrites, idPanier)
);

CREATE TABLE Panier
(
	idPanier INT AUTO_INCREMENT,
	prix FLOAT,
	PRIMARY KEY (idPanier)
);

CREATE TABLE Client
(
	idClient INT AUTO_INCREMENT,
	nomClient VARCHAR (64),
	prenomClient VARCHAR (64),
	mail VARCHAR (128),
	adresse VARCHAR (64),
	password VARCHAR (64),
	PRIMARY KEY (idClient)
);

CREATE TABLE ClientPanier
(
	idClient INT,
	idPanier INT,
	PRIMARY KEY (idClient, idPanier)
);

CREATE TABLE Boisson
(
	idBoisson INT AUTO_INCREMENT,
	nomBoisson VARCHAR (64),
	prixBoisson VARCHAR (64),
	PRIMARY KEY (idBoisson)
);

CREATE TABLE BoissonPanier
(
	idBoisson INT,
	idPanier INT,
	quantite INT,
	PRIMARY KEY (idBoisson, idPanier)
);

CREATE TABLE Taille
(
	idTaille INT AUTO_INCREMENT,
	nomTaille VARCHAR (64),
	descriptionTaille LONGTEXT,
	prixTaille FLOAT,
	PRIMARY KEY (idTaille)
);

CREATE TABLE Sauce
(
	idSauce INT AUTO_INCREMENT,
	nomSauce VARCHAR (64),
	descriptionSauce LONGTEXT,
	PRIMARY KEY (idSauce)
);

CREATE TABLE Viande
(
	idViande INT AUTO_INCREMENT,
	nomViande VARCHAR (64),
	descriptionViande LONGTEXT,
	PRIMARY KEY (idViande)
);

CREATE TABLE Tacos
(
	idTacos INT AUTO_INCREMENT,
	idTaille INT,
	idViande1 INT,
	idViande2 INT,
	idViande3 INT,
	idSauce1 INT,
	idSauce2 INT,
	PRIMARY KEY (idTacos)
);

CREATE TABLE TacosPanier
(
	idTacos INT,
	idPanier INT,
	PRIMARY KEY (idTacos, idPanier)
);

ALTER TABLE FritesPanier
ADD CONSTRAINT FritesPanier_idFrites
FOREIGN KEY (idFrites)
REFERENCES Frites (idFrites);

ALTER TABLE FritesPanier
ADD CONSTRAINT FritesPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE ClientPanier
ADD CONSTRAINT ClientPanier_idClient
FOREIGN KEY (idClient)
REFERENCES Client (idClient);

ALTER TABLE ClientPanier
ADD CONSTRAINT ClientPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE BoissonPanier
ADD CONSTRAINT BoissonPanier_idBoisson
FOREIGN KEY (idBoisson)
REFERENCES Boisson (idBoisson);

ALTER TABLE BoissonPanier
ADD CONSTRAINT BoissonPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE TacosPanier
ADD CONSTRAINT TacosPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE TacosPanier
ADD CONSTRAINT TacosPanier_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos (idTacos);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idTaille
FOREIGN KEY (idTaille)
REFERENCES Taille (idTaille);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idViande1
FOREIGN KEY (idViande1)
REFERENCES Viande (idViande);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idViande2
FOREIGN KEY (idViande2)
REFERENCES Viande (idViande);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idViande3
FOREIGN KEY (idViande3)
REFERENCES Viande (idViande);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idSauce1
FOREIGN KEY (idSauce1)
REFERENCES Sauce (idSauce);

ALTER TABLE Tacos
ADD CONSTRAINT Tacos_idSauce2
FOREIGN KEY (idSauce2)
REFERENCES Sauce (idSauce);

INSERT INTO Taille (nomTaille, descriptionTaille, prixTaille) VALUES
("Tacos M", "1 viande et 1 sauce au choix", 5),
("Tacos L", "2 viandes et 2 sauces au choix", 7),
("Tacos XL", "3 viandes et 2 sauces au choix", 9);

INSERT INTO Viande (nomViande, descriptionViande) VALUES
("Escalope de poulet", "De tendres escalopes de poulet"),
("Viande hachee", "Une delicieuse viande de boeuf hachée"),
("Cordon bleu", "Une tranche de jambon et du fromage prisoniers d'une savoureuse escalope de poulet panée"),
("Nuggets de poulet", "Des nuggets de poulet frits a l'huile biologique"),
("Merguez", "Des merguez venant tout droit du boucher local"),
("Tenders", "Des morceaux de poulets enveloppés d'une chapelure assaisonée au paprika, a la moutarde et au poivre");

INSERT INTO Sauce (nomSauce, descriptionSauce) VALUES
("Sauce Mayonaise", "Sauce a base d'huile, de jaune d'oeuf et de vinaigre"),
("Sauce Ketchup", "Sauce a base de tomates, de vinagre et de sucre"),
("Sauce Samouraï", "Sauce belge assez relevée a base de mayoannaise, de ketchup et de harissa"),
("Sauce Chili", "Sauce très relevée a base de tomate et de piment"),
("Sauce Barbecue", "Sauce a base de ketchup, de paprika, de miel, de sauce aigre-douce avec un zeste de piment"),
("Sauce Harissa", "Sauce très relevée a base de piment, d'ail, de coriande, de cumin et de gingembre"),
("Sauce Texane", "Sauce a base de ketchup, de bouillon de boeuf, de pimet doux, de paprika, de moutarde forte et d'ail");

INSERT INTO Boisson (nomBoisson, prixBoisson) VALUES
("Coca-cola", 1),
("Oasis", 1),
("Fanta", 1),
("Sprite", 1),
("Ice tea", 1),
("Eau", 1);

INSERT INTO Frites (nomFrites, prixFrites) VALUES
("Petite frite", 1.5),
("Grande frite", 2.5),
("Petite potatoes", 1.5),
("Grande potatoes", 2.5);