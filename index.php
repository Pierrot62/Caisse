<?php
function ChargerClasse($classe)
{
    if (file_exists("PHP/controller/" . $classe . ".Class.php")) {
        require "PHP/controller/" . $classe . ".Class.php";
    }

    if (file_exists("PHP/model/" . $classe . ".Class.php")) {
        require "PHP/model/" . $classe . ".Class.php";
    }
}
spl_autoload_register("ChargerClasse");

function afficherPage($chemin, $page, $titre)
{
    require 'php/View/head.php';
    require 'php/View/header.php';
    require $chemin . $page . '.php';
    require 'php/View/footer.php';
}
DbConnect::init();
session_start();

if (isset($_GET['action']) || isset($_GET['m']) || isset($_GET['id'])) {

    switch ($_GET['action']) {
        case 'connect': {
                afficherPage('Php/View/', 'FormConnection', "Connection");
                break;
            }
        case 'deconnect': {
                afficherPage('Php/View/', 'HtmlDeconnection', "Deconnection");
                break;
            }
        case 'ChoixListe': {
                afficherPage('Php/View/', 'ChoixListe', "Gestion Liste");
                break;
        }
        case 'test': {
            afficherPage('Php/Model/', 'TestManagerPierre', "TestManager");
            break;
    }
       
    }
} else { // Sinon, on affiche la page principale du site
    afficherPage('Php/View/', 'FormConnection', "Connection");
}
