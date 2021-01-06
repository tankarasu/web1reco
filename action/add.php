<?php
require '../assets/config.php';

var_dump ($_GET);

$nom = $_GET['nom'];
$descriptions = $_GET['descriptions'];
$equitable = $_GET['equitable'];
$Categorie_id = $_GET['Categorie_id'];
$prix = $_GET['prix'];
$stock = $_GET['stock'];
$promo = $_GET['promo'];
$source = $_GET['source'];

if( $equitable==""){
    $equitable=0;
};

if( $promo==""){
    $promo=0;
};


$sql = "INSERT INTO base1reco.produits (nom,descriptions,equitable,Categorie_id,prix,stock,promo,source) VALUES
('$nom','$descriptions',$equitable,$Categorie_id,$prix,$stock,$promo,'$source')";

// Exécution de la requête d'ajout
$resultat = $dbh->query($sql);

$dbh = null;
?>
