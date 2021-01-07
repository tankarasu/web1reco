<?php
// session
session_start();

// include
require '../assets/config.php';
    // défini une contrainte pour la recherche
	$query = $_GET['pSearch']; 
	$min_length = 3;
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
    // on vérifie que la contrainte est respecté
    if(strlen($query) >= $min_length){
        // change les caractères spéciaux en équivalent HTML
        $query = htmlspecialchars($query);
        
        // on initialise la requête
        $sql = "SELECT * FROM base1reco.produits
            WHERE (`nom` LIKE '%".$query."%') OR (`descriptions` LIKE '%".$query."%')";

            // Exécution de la requête de sélection
                $resultat = $dbh->query($sql);
                $les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);                
            
                // si on a un retour
                if(sizeof($les_produits) > 0)
                {             
                    // tant que les $produits n'est pas vide  
                    echo "<div class='row'>";      
                        foreach($les_produits as $produit){
                            $src = "../images/produits/".$produit['Categorie_id']."/".$produit['source']."";
                            echo "  
                                <div class='card product_card col-lg-2 col-md-3 col-sm-4'>
                                    <img class='card-img-top' alt='photo produit' src=$src> 
                                    <div class='card-body'>
                                        <h5 class='card-title'>".$produit['nom']."</h5>
                                        <p class='card-text'>".$produit['descriptions']."</p>
                                        <button class='btn btn-primary'>Add to Cart</button>
                                    </div>
                                </div> 
                                ";
                }
            echo "</div>";
		}
		else{ 
			echo "Pas de résultat";
		}
    }
    
    retourne();
    ?>

</body>
</html>