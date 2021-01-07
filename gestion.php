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
    $formulaire -> deleteProduct();

?>

<?php
    // Formulaire de modification
    $formulaire -> handleProductForm($formulaire->modify);

?>

<?php
    // Formulaire d'ajout
    $formulaire -> handleProductForm($formulaire->add);
    echo "</div>";
?>
    
</body>
</html>