<?php 

/* Test Manager */

// echo"**********************************************";

// on teste la recherche par ID
// echo 'recherche id = 3' . '<br>';
$p = TicketsManager::findById(2);
// var_dump($p);


// echo"**********************************************";

// // on teste l'ajout

// echo "ajout d'un Tickets" . '<br>';
// $aNew = new Tickets(["prixHT" => 150, "date" => new DATETIME('2020-11-24'), "montantTVA" => 2.5]);
// var_dump($aNew);
// TicketsManager::add($aNew);

// echo"**********************************************";

//on affiche la liste des produits
// echo "Liste des articles" . '<br>';
// $tableau = TicketsManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// echo"**********************************************";

// // on teste la mise à jour
// echo "on met à jour l'id 2" . '<br>';
// $p->setprixHT(1.5);
// TicketsManager::update($p);
// $pRecharge = TicketsManager::findById(2);

// on teste la suppression
echo "on supprime un article" . '<br>';
$pSuppr = TicketsManager::findById(3);
TicketsManager::delete($pSuppr);


// //on affiche la liste des produits
// echo "liste des articles" . '<br>';
// $tableau = ProduitsManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// include "PHP/VIEW/Footer.php";
