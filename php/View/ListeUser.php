<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>
<?php

$user=UserManager::getlist();

?>  
<section class="">
        <div class="bloc">
            <div class="colonne">Identifiant</div>
           
            <div class="colonne">Role</div>
            <div class="micolonne"> </div>
            </div>

            <?php
    foreach ($user as $elmt) {
         ?>
            <div class="bloc1">

            <div class="colonne"><?php echo $elmt ->getIdentifiant()?></div>
            
            <div class="colonne"><?php echo $elmt ->getRole()?></div>

            <?php


      echo '<a class="btn" href="index.php?action=FormUser&m=ajout&id=' . $elmt->getIdentifiant() . '">
            <div>Modifier</div></a>';
     echo '<a class="btn" href="index.php?action=FormUser&m=ajout&id=' . $elmt->getIdentifiant() . '">
     <div>Supprimer</div></a>';

     echo '</div>';
    }
    echo '<a class="btnaj" href="index.php?action=FormUser&m=ajout">
    <div > Ajouter</div></a> ';

    ?>
    </section>