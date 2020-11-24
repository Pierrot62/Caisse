<?php
$mode = $_GET["m"];
$p = new Categorie($_POST);
if ($lvl==2){
switch ($mode)
{
    case "ajout":
        CategorieManager::add($p);
        break;
    case "modif":
        CategorieManager::update($p);
        break;
    case "suppr":
        
            CategorieManager::delete($p);
        
        break;
}
}
header("location:index.php?action=Confirmation");
