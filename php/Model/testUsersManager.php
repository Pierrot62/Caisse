
<!DOCTYPE html>
<html>
<head>
<?php
function chargerClasse($classe)
{
    if (file_exists("Php/Controller/" . $classe . ".Class.php"))
    {
        require "Php/Controller/" . $classe . ".Class.php";
    }else if(file_exists("../Controller/" . $classe . ".Class.php")){

        require "../Controller/" . $classe . ".Class.php";

    }

    if (file_exists("Php/Model/" . $classe . ".Class.php"))
    {
        require "Php/Model/" . $classe . ".Class.php";

    }else if (file_exists("../Model/" . $classe . ".Class.php")){

        require "../Model/" . $classe . ".Class.php";

    }

}
spl_autoload_register("chargerClasse");

// initialise une connection
DbConnect::init();
?>
<title>Test Users</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="./Caisse/css/style.css">
</head>
<body>
    

<?php

/* Test Manager Users */

// on teste la recherche par ID
echo 'recherche id = 1' . '<br>';
$p = UsersManager::findById(2);
var_dump($p);

// on teste l'ajout
// echo "ajout d'un produit" . '<br>';
// $pNew = new Users(["identifiant" => "cahier", "motDePasse" => "root", "role" => 1]);
// UsersManager::add($pNew);

// //on affiche la liste des produits
// echo "Liste des articles" . '<br>';
// $tableau = UsersManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// // on teste la mise à jour
// echo "on met à jour l'id 1" . '<br>';
// $p->setIdentifiant($p->getIdentifiant() . 'sss');
// UsersManager::update($p);
// $pRecharge = UsersManager::findById(2);
// var_dump($pRecharge);

// on teste la suppression
// echo "on supprime un article" . '<br>';
// $pSuppr = UsersManager::findById(2);
// UsersManager::delete($pSuppr);


// //on affiche la liste des produits
// echo "liste des articles" . '<br>';
// $tableau = ProduitsManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// // on test la fonction findByName
// $pRequete=UsersManager::findByName("admin");
// var_dump($pRequete);


?>
</body>