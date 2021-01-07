<?php
// session
session_start();

require '../assets/config.php';
$id = intval($_POST['id']);

$sql = "DELETE FROM base1reco.produits WHERE id=$id";

// Exécution de la requête de suppression
$resultat = $dbh->query($sql);

$dbh = null;
?>