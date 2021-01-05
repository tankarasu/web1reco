-- create user for handling database
CREATE USER 'admin'@'%' IDENTIFIED BY 'root';
GRANT ALL ON *.* TO 'admin'@'%';
FLUSH PRIVILEGES;

-- creating structure of the database
DROP DATABASE IF EXISTS drive;
CREATE DATABASE drive DEFAULT CHARACTER SET utf8mb4;
-- table user
CREATE TABLE drive.user (
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    passwords VARCHAR(8) NOT NULL,
    PRIMARY KEY (id)
) ;

-- table categorie
CREATE TABLE drive.categorie (
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) DEFAULT NULL,
    descriptions VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (id)
);

-- table produits
CREATE TABLE drive.produits (
    id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) DEFAULT NULL,
    descriptions VARCHAR(100) DEFAULT NULL,
    equitable BOOLEAN,
    Categorie_id INT NOT NULL,
    prix FLOAT NOT NULL,
    stock INT,
    promo BOOLEAN,
    source VARCHAR(2),
    PRIMARY KEY (id),
    FOREIGN KEY (Categorie_id) REFERENCES drive.categorie(id)
);

ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- insert user
INSERT INTO drive.user (nom, email,passwords) VALUES
('admin','admin@example.com','root')
('Tan','tan@example.com','azerty'),
('Alex','alex@example.com','azerty'),
('Sofia','sofia@example.com','azerty');

-- insert categorie
INSERT INTO drive.categorie(nom,descriptions) VALUES
('Bio','tous les produits issus du circuit bio'),
('Viandes','coté fraicheur et seigneur en boucherie'),
('fruitlegume','notre étal du marché frais'),
('boulpat','notre rayon boulangerie et patisserie'),
('frais','le rayon frais par excellence'),
('Surgele','tout ce qui concerne les produits surgelés'),
('sale','notre épicerie salé à votre service'),
('sucre',"envie d'un petit plaisir sucré?"),
('boisson',"rien de tel qu'une boisson rafraichissante"),
('bebe','le rayon pour nos tout-petits'),
('hygiene','un incontournable de nos salle de bains'),
('lessive','sans ce rayon pas de garde-robe digne de ce nom');

-- insert produits
-- categorie bebe
INSERT INTO drive.produits(nom,descriptions,equitable,Categorie_id,prix,stock,promo,source) VALUES
('Evolia','lait Guigoz Evolia',false,10,13.8,35,false,"1.jpg"),
('Gallia','lait Guigoz Gallia',false,10,13.28,25,false,"2.jpg"),
('Nidal','lait Nestle Nidal',false,10,14.85,25,false,"3.jpg"),
('Calisma','lait Nestle Calisma 2',false,10,12.36,33,false"4.jpg"),
('Celia','lait Nestle Celia 2',false,10,13.36,55,true"5.jpg"),
-- categorie bio
('avocat','avocat bio du Pérou',true,1,3.95,25,false,"1.jpg"),
('orange','orange bio Tunisie',true,1,2.98,18,true,"2.jpg"),
('celeri','celeri rave France bio',true,1,2.05,36,false,"3.jpg"),
('aubergine','Aubergine bio turque 20 cm',true,1,1.50,10,true,"4.jpg"),
('tomate','tomate ronde Hollande bio',true,1,1.98,12,false,"5.jpg"),