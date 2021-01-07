<?php
// includes 
require './classes/Formulaires.php';
require './assets/config.php';
// instanciate class
$formulaire = new Formulaire();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Service</title>
    <link href="./assets/style.css" rel="stylesheet">
</head>
<body>

<?php
    echo "<nav class='navMenuGestion'>";
    echo "<h1>Gestion des produits</h1>";
    retour();
    echo "</nav>";
    echo "<div class='main-frame'>";

    // Formulaire de suppression
    echo "<div class='column'>";
    echo "<h5>Supprimer Produit</h5>";
    $formulaire -> deleteProduct();
    echo "</div>"
    ?>

<?php
    // Formulaire de modification
    echo "<div class='column'>";
    echo "<h5>Modifier Produit</h5>";
    $formulaire -> handleProductForm($formulaire->modify);
    echo "</div>"

    ?>

<?php
    // Formulaire d'ajout
    echo "<div class='column'>";
    echo "<h5>Ajouter Produit</h5>";
    $formulaire -> handleProductForm($formulaire->add);
    echo "</div>";    
    echo "</div>"

?>
    
</body>
</html>