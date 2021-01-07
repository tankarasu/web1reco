<?php
// session
session_start();

// panier codé en dur
$_SESSION['cart'] = ["10"=>2,"22"=>3,"32"=>1];

// includes 
require '../assets/config.php';
require '../classes/Buy.php';

// variables servant à la récupération des produits du panier
$cartKey = array_keys($_SESSION['cart']);
$stringKey="(". implode(',',$cartKey).")";

// variables servant à quantifier les produits sélectionnés
$cart =array_values($_SESSION['cart']);
$stringArray = "(" . implode(',',$cart) . ")";

// requête SQL
$sql = "SELECT  nom,prix FROM base1reco.produits WHERE id in $stringKey";

// Exécution de la requête de sélection
$resultat = $dbh->query($sql);
$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive Service</title>
    <link href="./assets/style.css" rel="stylesheet">  
</head>
<body>
    <?php
        // initialise les valeurs de contrôle
        $index = 0;
        $totalGeneral = 0;
        // on boucle sur chaque produit du panier
        foreach($les_produits as $produit){
            // instanciation de l'objet Buy
            $total = new Buy();
            $prixUnitaire = $produit['prix'];
            $totalProduit = $total ->calculateTotal(intval($cart[$index]),floatval($prixUnitaire)) ;
            $nom = $produit['nom'];
            echo $nom . " - " . $prixUnitaire . "€/pièce - quantité: " . $cart[$index] . " - total: ".$totalProduit. " € <br>";
            $index ++;
            // on rajoute la somme de la ligne au total général
            $totalGeneral += $totalProduit ;
        }
        echo "<br>Prix du panier total: ".$totalGeneral." € <br>"
    ?>

<?php
    $dbh =null;
    retourne();

?>
</body>
</html>