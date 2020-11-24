<?php
if (!isset($_POST['identifiant'])) // On est dans la page de formulaire
{
    require 'Php/View/HtmlConnection.php'; // On affiche le formulaire
}
else
{ // Le formulaire a été validé
    $message = '';
    if (empty($_POST['identifiant']) || empty($_POST['motDePasse']) || empty($_POST['numCaisse'])) // Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	                   Vous devez remplir tous les champs</p>
	                   <p>Cliquez <a href="index.php?action=connect">ici</a> pour revenir</p>';
    }
else // On check le mot de passe
    {
        $utilisateur = UserManager::get($_POST['identifiant']);
        $caisse = CaisseManager::get($_POST['numCaisse']);
         // On recherche dans la base l'utilisateur et on rempli l'objet user

        if ($utilisateur->getMotDePasse() == md5($_POST['motDePasse'])) // Acces OK !
        {
            $_SESSION['identifiant'] = $utilisateur->getIdentifiant();
            $_SESSION['level'] = $utilisateur->getRole();
            $_SESSION['id'] = $utilisateur->getIdUser();
            $_SESSION['numCaisse'] = $caisse->getnumCaisse(); 
            $message = '
            <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p>Connection en cours ... </p>
            <div class="a"><a href="index.php?action=fondCaisse&m=deconnect">Deconnexion</a></div>
        </div>
        <h3>Bienvenue ' . $utilisateur->getIdentifiant() . ', vous êtes maintenant connecté!</h3>';
            if ($lvl >= 2){
            header("refresh:2,url=index.php?action=ChoixListe&m");
            }
            else{
            header("refresh:2,url=index.php?action=fondCaisse&m");
            }
            ?>
		<?php }
    else // Acces pas OK !
        {
            $message = '<h3>Une erreur s\'est produite 	    pendant votre identification.<br /> Le mot de passe ou le identifiant
            entré n\'est pas correcte.</h3>';
            header("refresh:3,url=index.php?action=connect");
        }
    }
    echo $message;
}

?>

