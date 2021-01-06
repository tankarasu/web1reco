<?php
class Formulaire
{
    public $add = './action/add.php';
    public $modify='./action/modify.php';

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

public function handleProductForm($action)// modify && add product
    {    
    echo  " <form action='".$action."' method='GET' class='handleForm'>";
            if($action=='./action/modify.php'){
                echo    '<label for="id">Id to modify</label>
                         <input type="number" value="" min=1 step=1 id="id" name="id"></input>';
                }
            echo "<label for='nom'>Nom:</label>
                <input type='text' id='nom' name='nom'></input>
                <label for='descriptions'>Description:</label>
                <textarea id='descriptions' name='descriptions'rows='5' cols='33'></textarea>
                <label for='Categorie_id'>Catégorie:</label>
                <select name='Categorie_id' id='Categorie_id' >
                    <option value='1'>BIO</option>
                    <option value='2'>Viandes</option>
                    <option value='3'>F-Leg</option>
                    <option value='4'>Boul-Pat</option>
                    <option value='5'>Frais5</option>
                    <option value='6'>Surgelés</option>
                    <option value='7'>Salé</option>
                    <option value='8'>Sucré</option>
                    <option value='9'>Boisson</option>
                    <option value='10'>Bébé</option>
                    <option value='11'>Hygiène</option>
                    <option value='12'>Lessive</option>
                </select>
                <label for='stock'>Stock:</label>
                <input type='number' min=0 step=1 name='stock' id='stock'></input>
                <div>
                    <label for='equitable'>Equitable:</label>
                    <input type='checkbox' name='equitable' id='equitable' value=1></input>
                </div>
                <div>
                    <label for='promo'>en Promotion:</label>
                    <input type='checkbox' name='promo' id='promo' value=1></input>
                </div>
                <label for='prix'>Prix:</label>
                <input type='number' min=0 step=0.01 name='prix' id='prix'></input>
                <label for='source'>Source:</label>
                <input type='text' name='source' id='source'></input>
                <input type='submit' value='submit'>
            </form>";
    }
}
?>