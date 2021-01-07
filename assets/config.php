<?php
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'admin');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'base1reco');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

function retour(){
    echo '<a href="index.php">index</a>';
}

?>