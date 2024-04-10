DROP DATABASE IF EXISTS `wine4all`;

CREATE DATABASE `wine4all` CHARACTER SET utf8;

USE `wine4all`;

CREATE TABLE vins(
    idVin INT AUTO_INCREMENT,
    nomVin VARCHAR(100),
    domaine VARCHAR(100),
    region VARCHAR(100),
    pays VARCHAR(100),
    tauxAlcool DECIMAL(4, 2),
    petillant BOOLEAN,
    volume DECIMAL(15, 2),
    bio BOOLEAN,
    couleur VARCHAR(50),
    urlImage VARCHAR(200),
    cépages VARCHAR(200),
    millésime INT,
    description TEXT,
    PRIMARY KEY(idVin)
);

CREATE TABLE users(
    idUser INT AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    email VARCHAR(200),
    adresse VARCHAR(50),
    role VARCHAR(50),
    PRIMARY KEY(idUser)
);

CREATE TABLE ventes(
    idVentes INT AUTO_INCREMENT,
    idVin INT,
    idUser INT,
    prix VARCHAR(50),
    PRIMARY KEY(idVentes),
    FOREIGN KEY(idVin) REFERENCES vins(idVin),
    FOREIGN KEY(idUser) REFERENCES users(idUser)
);

CREATE TABLE avis(
    idAvis INT AUTO_INCREMENT,
    idVin INT,
    idUser INT,
    Avis TEXT,
    note INT,
    PRIMARY KEY(idAvis),
    FOREIGN KEY(idVin) REFERENCES vins(idVin),
    FOREIGN KEY(idUser) REFERENCES users(idUser)
);

INSERT INTO
    vins (
        nomVin,
        domaine,
        region,
        pays,
        tauxAlcool,
        petillant,
        volume,
        bio,
        couleur,
        urlImage,
        cépages,
        millésime,
        description
    )
VALUES
    (
        'Château Lafite Rothschild',
        'Domaine Barons de Rothschild (Lafite)',
        'Pauillac',
        'France',
        12.5,
        FALSE,
        750.00,
        FALSE,
        'Red',
        'https://example.com/image1.jpg',
        'Cabernet Sauvignon, Merlot',
        2018,
        'A classic Pauillac with rich tannins, deep blackcurrant flavors, and a long finish.'
    ),
    (
        'Dom Pérignon',
        'Moët & Chandon',
        'Champagne',
        'France',
        12.0,
        TRUE,
        750.00,
        FALSE,
        'White',
        'https://example.com/image2.jpg',
        'Chardonnay, Pinot Noir',
        2010,
        'A prestigious champagne that offers complexity, silkiness, and a celebrated history.'
    ),
    (
        'Opus One',
        'Opus One Winery',
        'Napa Valley',
        'USA',
        14.0,
        FALSE,
        750.00,
        FALSE,
        'Red',
        'https://example.com/image3.jpg',
        'Cabernet Sauvignon, Merlot, Cabernet Franc, Petit Verdot, Malbec',
        2016,
        'A harmonious blend offering a mix of cassis, cedar, and floral notes with a balanced acidity.'
    ),
    (
        'Penfolds Grange',
        'Penfolds',
        'South Australia',
        'Australia',
        14.5,
        FALSE,
        750.00,
        FALSE,
        'Red',
        'https://example.com/image4.jpg',
        'Shiraz',
        2015,
        'A powerful expression of Australian Shiraz, with rich fruit flavors and a robust structure.'
    ),
    (
        'Sassicaia',
        'Tenuta San Guido',
        'Tuscany',
        'Italy',
        13.5,
        FALSE,
        750.00,
        FALSE,
        'Red',
        'https://example.com/image5.jpg',
        'Cabernet Sauvignon, Cabernet Franc',
        2017,
        'A Super Tuscan renowned for its exquisite elegance, balance, and aging potential.'
    );