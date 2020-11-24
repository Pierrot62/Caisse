<?php 


// function chargerClasse($classe)
// {
//     if (file_exists("../Controller/" . $classe . ".class.php"))
//     {
//         require "../Controller/" . $classe . ".class.php";
//     }

//     if (file_exists("../Model/" . $classe . ".class.php"))
//     {
//         require "../Model/" . $classe . ".class.php";
//     }

// }
// spl_autoload_register("chargerClasse");

// DbConnect::init();
/* Test Manager */

// echo"**********************************************";

// on teste la recherche par ID
// echo 'recherche id = 3' . '<br>';
// $p = ArticlesManager::findById(30);
// var_dump($p);


// echo"**********************************************";

// // // on teste l'ajout
// echo "ajout d'un article" . '<br>';
// $aNew = new Articles(["libelleArticle" => "cahier", "prixHt" => 5, "codeBarre" => 148457, "idCategorie" => 2,"idTva" => 2]);
// var_dump($aNew);
// ArticlesManager::add($aNew);

// echo"**********************************************";

// //on affiche la liste des produits
// echo "Liste des articles" . '<br>';
// $tableau = ArticlesManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// echo"**********************************************";

// // on teste la mise à jour
// echo "on met à jour l'id 3" . '<br>';
// $p->setLibelleArticle($p->getLibelleArticle() . 'ssss');
// ArticlesManager::update($p);
// $pRecharge = ArticlesManager::findById(7);

// on teste la suppression
// echo "on supprime un article" . '<br>';
// $pSuppr = ArticlesManager::findById(4);
// ArticlesManager::delete($pSuppr);


// //on affiche la liste des produits
// echo "liste des articles" . '<br>';
// $tableau = ProduitsManager::getList();
// foreach ($tableau as $unProduit)
// {
//     echo $unProduit->toString() . '<br>';
// }

// include "PHP/VIEW/Footer.php";
