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
-- categorie boisson
('Thé Menthe Bio','Thé glacé saveur menthe et citron bio 1L',false,9,2.0,15,false,"1.jpg"),
('Lipton Citron','Thé glacé citron & citron vert 1.5L',false,9,1.5,15,false,"2.jpg"),
('May Tea','Pack de canettes 6x33cl, Boisson au thé glacé noir pêche blanche',false,9,3.80,15,true,"3.jpg"),
('Oasis Casis','Pack de bouteilles 2x2 pomme cassis framboise OASIS ',false,9,4.0,15,true,"4.jpg"),
('Capri-Sun Tropical','10x200ml limonade non pétillante à base de jus de fruits. ',false,9,4.0,15,true,"5.jpg"),
-- categorie boulpat
('Baguette','baguette à la farine blanche',false,4,0.90,25,false,"1.jpg"),
('Epi d or','Pain special de Campagne 500 g',false,4,1.5,40,false,"2.jpg"),
('Gland','Pâtisserie française pate à choux et glaçage aux chocolats',false,4,0.90,40,false,"3.jpg"),
('Galette Des Rois','Pâtisserie fait par nos chefs pâtissiers ',false,4,6.90,50,false,"4.jpg"),
('Chaussons aux pommes','Barquette de 4 chaussons aux pommes aux beurres',false,4,5.0,20,false,"5.jpg"),
-- categorie fleg
('Carotte','FQC Carottes 1kg',false,3,1.0,100,false,"1.jpg"),
('Pommes de Terre','Fillet de 2.5kg de pommes de terre',false,3,3.30,150,false,"2.jpg"),
('Poivrons','Poivrons en Vrac, vendu au kg',false,3,2.49,150,false,"3.jpg"),
('Salade','Scarole Vrac ',false,3,1.89,100,false,"4.jpg"),
('Aubergine Bio','Aubergines Vrac',false,3,2.49,100,false,"5.jpg"),
-- categorie frais
('Oeuf bio Matine','Oeuf bio frais, boîte de 6',true,5,3.5,100,false,"1.jpg"),
('Lactel Lait bio','Pack de lait Bio, bouteille 1L',false,5,6.5,200,false,"2.jpg"),
('Délisse Fraise','Pack de lait à la fraise, brique 1L',false,5,5.0,100,true,"3.jpg"),
('Président beurre','beurre 250g doux gastronomique',false,5,2.5,50,false,"4.jpg"),
('Yoplait','Pot de crème fraiche légère 12%MG 50cl',true,5,3.5,100,false,"5.jpg"),
-- catégorie hygiene
('Le petit Marseillais Bio','Petit Marseillais Gel douche bio rafraichissant feuilles d olivier, rechargeable 250ml',true,11,2.64,50,false,"1.jpg"),
('Bouquet de fleure Bio','Savon de douche bio à la lavande 250ml',false,11,3.40,50,false,"2.jpg"),
('Ushuaïa','Shampooing douche fraîcheur intense minéraux marins 250ml',false,11,2.39,80,true,"3.jpg"),
('Le petit Marseillais','Le Petit Marseillais Gel douche & bain hydratant olivier, tilleul 650ml',false,11,4.69,80,false,"4.jpg"),
('Manava','Savon de douche vanille 650ml',false,11,3.69,40,false,"5.jpg"),
-- catégorie nettoyage
('Ariel','Ariel Lessive en capsule tout en 1 original 22 lavages',false,12,9.99,60,true,"1.jpg"),
('Epsil','Epsil Lessive en capsule tout en 1 original 22 lavages',false,12,9.99,80,true,"2.jpg"),
('Super Croix','Super Croix Maroc Lessive en capsule tout en 1 original 22 lavages',false,12,11.99,70,false,"3.jpg"),
('Skip','Skip Lessive liquide en format 3x34 2.25L Fraîcheur intense, 102 lavage',false,12,9.99,80,true,"4.jpg"),
('Epsil','Epsil Lessive Laine & Coton 2.25L',false,12,9.40,50,false,"5.jpg"),
-- catégorie sale
('Uncle Bens','Uncle Bens Riz tomates huile d olive sachet recyclable prêt en 2 min 250g',false,7,1.65,150,true,"1.jpg"),
('Uncle Bens','Uncle Bens Riz paëlla sachet recyclable prêt en 2 min 250g',false,7,1.65,50,true,"2.jpg"),
('Vivien Paille','Vivien Paille lentilles oignons carottes express ! 1m 50g',false,7,1.5,40,false,"3.jpg"),
('Jardin Bio','Coquillettes semi-complètes',true,7,9.99,80,true,"4.jpg"),
('Bonduelle','Bonduelle petits pois , boîte de conserve',false,7,0.99,80,false,"5.jpg"),
-- catégorie sucre
('San Marco','San Marco , capsule compostable de café x50 N°8',true,8,6.89,80,false,"1.jpg"),
("L'Or","L'Or Espresso Capsules de café delizioso compatibles Nespresso 104g",false,8,5.79,80,false,"2.jpg"),
('Senseo','Senseo Dosettes de café corsé compostables x40-277g',false,8,4.90,80,true,"3.jpg"),
('Nescafé','Nescafé Café soluble spécial filtre riche et subtile 200g',true,8,6.29,80,true,"4.jpg"),
('Cracotte','Cracotte Tartine croustillante fourrée chocolat fabriqué en France 200g',false,8,5.0,80,true,"5.jpg"),
-- catégorie surgeles
("Beurre d'escargot","Beurre d'escargot 250g",false,6,3.95,20,true,"1.jpg"),
('CôtéTable',' Crêpe jambon emmental 300g',false,1.40,80,true,"2.jpg"),
('Charal','2 Kebabs 2x150g',false,6,5.99,40,false,"3.jpg"),
('CôtéTable','Lasagnes à la bolognaise de boeuf',false,6,4.20,30,true,"4.jpg"),
('CôtéTable','Hachis Parmentier',false,6,3.99,40,false,"5.jpg"),
-- catégorie Viande
('Boucherie-Steack Le Boeuf','Viande sélectionné par nos boucher 100g',false,2,5.40,30,false,"1.jpg"),
('Boucherie-Faux-filet Le Boeuf','Viande sélectionné par nos boucher 100g',false,2,5.99,40,false,"2.jpg"),
('Boucherie-Bavette Le Boeuf','Viande sélectionné par nos boucher 100g',false,2,4.50,40,false,"3.jpg"),
('Boeuf Bourgignon BIO pure boeuf','barquette de viande de boeuf bourgignon 200g',true,2,6.50,40,false,"4.jpg"),
('Faux-filet Bio','Une tranche de faux-fillet Bio 90g',true,2,3.99,40,true,"5.jpg"),