<?php 

function chargerClasse($classe)
{
	if (file_exists("../Controller/" . $classe . ".Class.php"))
	{
		require "../Controller/" . $classe . ".Class.php";
	}

	if (file_exists("../Model/" . $classe . ".Class.php"))
	{
		require "../Model/" . $classe . ".Class.php";
	}

}
spl_autoload_register("chargerClasse");
DbConnect::init();
include "../VIEW/head.php";

/*********  TEST CAISSESMANAGER **********/

// on teste la recherche par ID
// echo 'recherche id = 1' . '<br>';
// $caisse = CaissesManager::findById(1);
// var_dump($caisse);

//  // on teste l'ajout
//  echo "ajout d'une caisse" . '<br>';
//  $caisseNew = new Caisses(["nomCaisse" => "caisse2", "totalCaisse" => 10, "date" => '2020-12-31', "idUser" => 2]);
//  CaissesManager::add($caisseNew);

// //on affiche la liste des caisses
// echo "Liste des caisses" . '<br>';
// $tableau = CaissesManager::getList();
// foreach ($tableau as $uneCaisse)
// {
//     echo $uneCaisse->toString() . '<br>';
// }

// on teste la mise à jour
// echo "on met à jour l'id 1" . '<br>';
// $caisse->setnomCaisse($caisse->getNomCaisse() . 'sss');
// CaissesManager::update($caisse);
// $caisseModifie = CaissesManager::findById(1);
// var_dump($caisseModifie);

// // on teste la suppression
// echo "on supprime une caisse" . '<br>';
// $cSuppr = CaissesManager::findById(3);
// CaissesManager::delete($cSuppr);

// //on affiche la liste des caisses
// echo "Liste des caisses" . '<br>';
// $tableau = CaissesManager::getList();
// foreach ($tableau as $uneCaisse)
// {
//     echo $uneCaisse->toString() . '<br>';
// }

// C'est un findByName en gros
// // on teste la'affichage de la caisse
// echo "on affiche une caisse" . '<br>';
// $c = CaissesManager::get("caisse2");
// var_dump($c);


// include "PHP/VIEW/Footer.php";


/*********  TEST CATEGORIESMANAGER **********/

// on teste la recherche par ID
// echo 'recherche id = 1' . '<br>';
//$categorie = CategoriesManager::findById(1);
// var_dump($categorie);

//  // on teste l'ajout
//  echo "ajout d'une catégorie" . '<br>';
//  $catNew = new Categories(["libelleCategorie" => "lingerie"]);
//  CategoriesManager::add($catNew);

// //on affiche la liste des categories
// echo "Liste des categories" . '<br>';
// $tableau = CategoriesManager::getList();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }

// //on teste la mise à jour
// echo "on met à jour l'id 1" . '<br>';
// $categorie->setlibelleCategorie($categorie->getlibelleCategorie() . 'sss');
// CategoriesManager::update($categorie);
// $categorieModifie = CategoriesManager::findById(1);
// var_dump($categorieModifie);

// // on teste la suppression
// echo "on supprime une caisse" . '<br>';
// $catSuppr = CategoriesManager::findById(3);
// CategoriesManager::delete($catSuppr);

// //on affiche la liste des categories
// echo "Liste des categories" . '<br>';
// $tableau = CategoriesManager::getList();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }

// on affiche toutes les infos d'une categorie
// echo "On affiche la catégorie" . '<br>';
// $cat = CategoriesManager::findByLibelleCategorie("alimentaire");
// var_dump($cat);

// on affiche la liste des categories avec leurs libelle
// echo "Liste des categories Juste avec le leurs libelles" . '<br>';
// $tableau = CategoriesManager::getListCategorie();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }


/*********  TEST LIGNESTICKETSMANAGER **********/


// on teste la recherche par ID
echo 'recherche id = 1' . '<br>';
$ligneticket = LignesTicketsManager::findById(1);
var_dump($ligneticket);

//  // on teste l'ajout
//  echo "ajout d'une catégorie" . '<br>';
//  $catNew = new Categories(["libelleCategorie" => "lingerie"]);
//  CategoriesManager::add($catNew);

// //on affiche la liste des categories
// echo "Liste des categories" . '<br>';
// $tableau = CategoriesManager::getList();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }

// //on teste la mise à jour
// echo "on met à jour l'id 1" . '<br>';
// $categorie->setlibelleCategorie($categorie->getlibelleCategorie() . 'sss');
// CategoriesManager::update($categorie);
// $categorieModifie = CategoriesManager::findById(1);
// var_dump($categorieModifie);

// // on teste la suppression
// echo "on supprime une caisse" . '<br>';
// $catSuppr = CategoriesManager::findById(3);
// CategoriesManager::delete($catSuppr);

// //on affiche la liste des categories
// echo "Liste des categories" . '<br>';
// $tableau = CategoriesManager::getList();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }

// on affiche toutes les infos d'une categorie
// echo "On affiche la catégorie" . '<br>';
// $cat = CategoriesManager::findByLibelleCategorie("alimentaire");
// var_dump($cat);

// on affiche la liste des categories avec leurs libelle
// echo "Liste des categories Juste avec le leurs libelles" . '<br>';
// $tableau = CategoriesManager::getListCategorie();
// foreach ($tableau as $uneCategorie)
// {
//     echo $uneCategorie->toString() . '<br>';
// }