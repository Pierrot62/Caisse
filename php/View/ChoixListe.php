<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>
<h2>Choisissez une liste :</h2>
<?php
//  if ($lvl != 1)
{
    echo '<div class="contenue">
        
            <div class="choix-liste-main">';

     echo'       <a href="index.php?action=ListeUser">
                <div class="choix-liste">
                    Liste des utilisateurs
                </div>
        </a>';
    echo '
        <a href="index.php?action=ListeArticle">
           
                <div class="choix-liste-2">
                    Liste des Articles
                </div>
        </a>';
    echo '
        <a href="index.php?action=ListeCaisse">
            
                <div class="choix-liste-3">
                    Liste des Caisses
                </div>
        </a>';

    echo '
        <a href="index.php?action=ListeCategorie">
            
                <div class="choix-liste-4">
                    Liste des Catégories
                </div>
        </a>';
echo '</div> </div>';
}
?>
