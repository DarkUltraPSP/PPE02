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

CREATE TABLE Tacos
(
	idTacos INT AUTO_INCREMENT,
	nomTacos VARCHAR (64),
	descriptionTacos LONGTEXT,
	PRIMARY KEY (idTacos)
);

CREATE TABLE TacosPanier
(
	idTacos INT,
	idPanier INT,
	PRIMARY KEY (idTacos, idPanier)
);

CREATE TABLE Sauce
(
	idSauce INT AUTO_INCREMENT,
	nomSauce VARCHAR (64),
	descriptionSauce LONGTEXT,
	PRIMARY KEY (idSauce)
);

CREATE TABLE SauceTacos
(
	idSauce INT,
	idTacos INT,
	PRIMARY KEY (idSauce, idTacos)
);

CREATE TABLE Viande
(
	idViande INT AUTO_INCREMENT,
	nomViande VARCHAR (64),
	descriptionViande LONGTEXT,
	PRIMARY KEY (idViande)
);

CREATE TABLE ViandeTacos
(
	idViande INT,
	idTacos INT,
	PRIMARY KEY (idViande, idTacos)
);

CREATE TABLE TacosClient
(
	idTacosClient INT AUTO_INCREMENT,
	idSize INT,
	idViande1 INT,
	idViande2 INT,
	idViande3 INT,
	idSauce1 INT,
	idSauce2 INT,
	PRIMARY KEY (idTacosClient)
);

CREATE TABLE TacosClientPanier
(
	idPanier INT,
	idTacosClient INT,
	PRIMARY KEY (idPanier, idTacosClient)
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
ADD CONSTRAINT TacosPanier_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos (idTacos);

ALTER TABLE TacosPanier
ADD CONSTRAINT TacosPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE SauceTacos
ADD CONSTRAINT SauceTacos_idSauce
FOREIGN KEY (idSauce)
REFERENCES Sauce (idSauce);

ALTER TABLE SauceTacos
ADD CONSTRAINT SauceTacos_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos (idTacos);

ALTER TABLE Viandetacos
ADD CONSTRAINT ViandeTacos_idViande
FOREIGN KEY (idViande)
REFERENCES Viande (idViande);

ALTER TABLE ViandeTacos
ADD CONSTRAINT ViandeTacos_idTacos
FOREIGN KEY (idTacos)
REFERENCES Tacos (idTacos);

ALTER TABLE TacosClientPanier
ADD CONSTRAINT TacosClientPanier_idPanier
FOREIGN KEY (idPanier)
REFERENCES Panier (idPanier);

ALTER TABLE TacosClientPanier
ADD CONSTRAINT TacosClientPanier_idTacosClient
FOREIGN KEY (idTacosClient)
REFERENCES TacosClient (idTacosClient);

INSERT INTO Tacos (nomTacos, descriptionTacos) VALUES
("Tacos M", "1 viande et 1 sauce au choix"),
("Tacos L", "2 viandes et 2 sauces au choix"),
("Tacos XL", "3 viandes et 2 sauces au choix");

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