<?php
class Formulaire
{
    $add = "./add.php";
    $modify="./modify.php";

public function deleteProduct()  // && delete product
{
    echo  ' <form action="./action/delete.php" method="POST" class="handleForm">
                <label for="id">Id to delete:</label>
                <input type="number" id="id" name="id" min=1></input>
                <input type="submit"></input>
            </form>';
}

public function showCart()
{
   echo  ' <form action="" method="" class="handleForm">
                <label for="cart">Your cart:</label>
                <p>Test Cart 250 €</p>
                <input type="submit" value="Pay"></input>
            </form>';
}

public function handleProductForm()// modify && add product
    {    
    echo  ' <form action="" method="GET" class="handleForm">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom"></input>
                <label for="descriptions">Description:</label>
                <textarea id="descriptions" name="descriptions"rows="5" cols="33"></textarea>
                <label for="categorie">Catégorie:</label>
                <select name="categorie" id="categorie" >
                <option value="bio">Bio</option>
                <option value="viandes">Viandes</option>
                </select>
                <label for="stock">Stock:</label>
                <input type="number" min=0 step=1 name="stock" id="stock"></input>
                <div>
                    <label for="equitable">Equitable:</label>
                    <input type="checkbox"></input>
                </div>
                <div>
                    <label for="promo">en Promotion:</label>
                    <input type="checkbox"></input>
                </div>
                <label for="prix">Prix:</label>
                <input type="number" min=0 step=0.01 name="prix" id="prix"></input>
                <label for="source">Source:</label>
                <input type="text" name="source" id="source"></input>
                <input type="submit" value="ajouter produit">
            </form>';
    }
}
?>