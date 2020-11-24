<?php
$mode = $_GET["m"];
$p = new Article($_POST);
       if ($lvl==2)
       {
switch ($mode)
{
    case "ajout":
        ArticleManager::add($p);
        break;
    case "modif":
        ArticleManager::update($p);
        break;
    case "suppr":
        ArticleManager::delete($p);
        break;
}
       }
header("location:index.php?action=Confirmation");
