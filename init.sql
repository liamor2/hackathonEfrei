DROP DATABASE IF EXISTS `wine4all`;

CREATE DATABASE `wine4all`;

USE `wine4all`;

CREATE TABLE Vins(
    idVin INT AUTO_INCREMENT,
    nomVin VARCHAR(100),
    Domaine VARCHAR(100),
    Region VARCHAR(100),
    Pays VARCHAR(100),
    tauxAlcool DECIMAL(4, 2),
    petillant LOGICAL,
    volume DECIMAL(15, 2),
    bio LOGICAL,
    couleur VARCHAR(50),
    urlImage VARCHAR(200),
    cépages VARCHAR(200),
    millésime INT,
    description TEXT,
    PRIMARY KEY(idVin)
);

CREATE TABLE Users(
    idUser INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(200),
    adresse VARCHAR(50),
    role VARCHAR(50),
    PRIMARY KEY(idUser)
);

CREATE TABLE Ventes(
    idVentes INT AUTO_INCREMENT,
    prix VARCHAR(50),
    PRIMARY KEY(idVentes),
    FOREIGN KEY(idVin) REFERENCES Vins(idVin),
    FOREIGN KEY(idUser) REFERENCES Users(idUser)
);

CREATE TABLE Avis(
    idAvis INT AUTO_INCREMENT,
    Avis TEXT,
    note INT,
    PRIMARY KEY(idAvis),
    FOREIGN KEY(idVin) REFERENCES Vins(idVin),
    FOREIGN KEY(idUser) REFERENCES Users(idUser)
);