<?php
// session
session_start();


// includes 
require './classes/Formulaires.php';
require './assets/config.php';

// initialisation des requêtes
$sql = "SELECT id, nom, descriptions,Categorie_id,source FROM base1reco.produits";
$sqlCategories  =  "SELECT id,nom,descriptions FROM base1reco.categorie";

// Exécution et traitement des requêtes de sélection
$resultat = $dbh->query($sql);
$les_produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
$categories = $dbh -> query($sqlCategories);
$les_categories = $categories -> fetchAll(PDO::FETCH_ASSOC);

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
    <header class='container main-menu'>
        <h1>Drive Service</h1>
        <form action="./action/search.php" method="GET">
	        <input type="text" name="pSearch" />
	        <input type="submit" value="Search" />
        </form>
        <form action="./action/categorieSearch.php" method="GET">
	        <select name='Categorie_id' id='Categorie_id' >
                <option value='1'>BIO</option>
                <option value='2'>Viandes</option>
                <option value='3'>F-Leg</option>
                <option value='4'>Boul-Pat</option>
                <option value='5'>Frais</option>
                <option value='6'>Surgelés</option>
                <option value='7'>Salé</option>
                <option value='8'>Sucré</option>
                <option value='9'>Boisson</option>
                <option value='10'>Bébé</option>
                <option value='11'>Hygiène</option>
                <option value='12'>Lessive</option>
            </select>
	        <input type="submit" value="Search" />
        </form>
        <ul class='mainMenuList'>
            <li><a href="./gestion.php">Gestion</a></li>
            <li><a href="./action/buy.php">Mon Panier</a></li>
        </ul>
    </header>
    <?php
    echo '<div class="container main-frame">';
    
?>
<nav class="">
   <?php 
   // affichage des liens de menus à gauche
   echo '<ul class="leftMenu">';
    foreach ($les_categories as $categorie){
        $nom = $categorie['nom'];
        echo "<li>
        <a href='#".$categorie['id']."'>".$nom."</a>
        </li>";
    }
    echo '</ul>';
   ?>

</nav>
    <?php
    echo '<div class="">';
    // on boucle sur les categories
    foreach ($les_categories as $categorie){
        $nom = $categorie['nom'];
        // affichage des categories dans le container principal
        echo "<div>";
        echo "<h2 id='".$categorie['id']."'>".$nom."</h2>";
        echo "<div class='row'>";
        foreach($les_produits as $produit){
            $src = "./images/produits/".$produit['Categorie_id']."/".$produit['source']."";
            $id = $categorie['id'];
            $idProduit = $produit['Categorie_id'];
            if($id == $idProduit){
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
            };
        }
        echo "</div>";
        echo "</div>";
    }
    echo '</div>';
    echo '</div>';
    $dbh = null;
    ?>

</body>

</html>