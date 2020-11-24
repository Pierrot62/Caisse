<?php
$mode = $_GET["m"];
$p = new Caisse($_POST);
switch ($mode)
{
    case "ajout":
        CaisseManager::add($p);
        break;
    case "modif":
        CaisseManager::update($p);
        break;
    case "suppr":
        if ($lvl==2)
        {
            CaisseManager::delete($p);
        }
        break;
}
header("location:index.php?action=Confirmation");
