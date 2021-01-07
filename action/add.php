<?php
// session
session_start();

// includes
require '../assets/config.php';

$nom = $_GET['nom'];
$descriptions = $_GET['descriptions'];
$equitable = $_GET['equitable'] ?? 0;
$Categorie_id = $_GET['Categorie_id'];
$prix = $_GET['prix'];
$stock = $_GET['stock'];
$promo = $_GET['promo'] ?? 0;
$source = $_GET['source'];

$sql = "INSERT INTO base1reco.produits (nom,descriptions,equitable,Categorie_id,prix,stock,promo,source) VALUES
('$nom','$descriptions',$equitable,$Categorie_id,$prix,$stock,$promo,'$source')";

// Exécution de la requête d'ajout
$resultat = $dbh->query($sql);

$dbh = null;
?>
