<?php
$mode = $_GET["m"];
$p = new User($_POST);
if ($lvl==2){

switch ($mode)
{
    case "ajout":
        UserManager::add($p);
        break;
    case "modif":
        UserManager::update($p);
        break;
    case "suppr":
            UserManager::delete($p);
        break;
}
}
header("location:index.php?action=Confirmation");
