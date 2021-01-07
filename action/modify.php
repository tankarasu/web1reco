<?php
// session
session_start();

// includes
require '../assets/config.php';

// on destructure $_GET
$id= $_GET['id'];
$nom = $_GET['nom'];
$descriptions = $_GET['descriptions'];
$equitable = $_GET['equitable'] ?? 0;
// voir add.php pour les détails
$Categorie_id = $_GET['Categorie_id'];
$prix = $_GET['prix'];
$stock = $_GET['stock'];
$promo = $_GET['promo'] ?? 0;
$source = $_GET['source'];

// requête pour modifier un produit
$sql = "UPDATE base1reco.produits SET nom='$nom',
descriptions = '$descriptions',
equitable = $equitable ,
Categorie_id = $Categorie_id,
prix = $prix,
stock = $stock,
promo = $promo,
source = '$source'
WHERE id = $id";

// Exécution de la requête d'ajout
$resultat = $dbh->query($sql);

$dbh = null;

retourne();
?>
