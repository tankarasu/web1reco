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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
<?php
    $dbh =null;
    retourne();

?>
</body>
</html>