# Drive Service
  -- programation en MOB programming
  -- participants : Tan-Alex-Sofia

# Concernant la classe BUY.PHP
 -- Ne parvenant pas à trouver la méthode permettant l'ajout d'objet au panier, on a décidé de faire un panier en dur et de le traiter dans le fichier buy.php, et la Classe Buy.php gère le calcul de chaque produit.  

 - Formulaire.php
  Classe qui permet l'affichage des différents formulaires

 - add.php
  execute la requête afin d'ajouter un produit dans la base de donnée
 - buy.php
  calcule la somme à payer pour le panier et permet l'achat des produits
 - modify.php
  modifie une entrée spécifié dans la base de donnée
- config.php
  refactorisation de la connection à la database
- delete.php
  permet la suppression d'un produit spécifique

- database.sql
  contient les requêtes à éxecuter pour mettre en place la base de donnée

- search.php
  permet la recherche de produit selon le nom ou la description
- categorieSearch.php
  permet la recherche de tous les produits selon une catégorie définie

- index.php
  point d'entrée de notre programme