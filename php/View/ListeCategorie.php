<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>
<?php

$categorie = CategorieManager::getList();
?>
<section class="">
<div class="bloc">
            <div class="colonne">Libelle catégorie</div>
            <div class="micolonne3"> </div>
            <div class="micolonne3"> </div>
        </div>
        
        <?php
        foreach ($categorie as $elmt){
            ?>
                    <div class="bloc1">
            <div class="colonne"><?php echo $elmt ->getLibelleCategorie()?></div>
      
      
        <?php
        // if ($lvl==2)
        // {
        echo '<a class="btn" href="index.php?action=FormCategorie&m=modif&id='. $elmt->getIdCategorie() .'">
            <div>Modifier</div></a>';
        echo '<a class="btn" href="index.php?action=FormCategorie&m=suppr&id='. $elmt->getIdCategorie() .'">
             <div >Supprimer</div></a>';

             echo '</div>';
         } 
        echo'<a class="btnaj" href="index.php?action=FormCategorie&m=ajout">
                        <div> Ajouter</div></a> ';
   
        // }
    ?>
    </section>