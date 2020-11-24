<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>

<?php
$caisse=CaisseManager::getList();
?> 
<section class="">
<div class="bloc">
            <div class="colonne">Numéro Caisse</div>
            <div class="colonne">Total Caisse</div>
            <div class="colonne">Date</div>
            <div class="colonne">Identifiant</div> 
            <div class="micolonne2"> </div>
            <div class="micolonne2"> </div>
            </div>
         <?php
    foreach ($caisse as $elmt) {
    ?>
            <div class="bloc1">
                <div class="colonne"><?php echo $elmt ->getNumCaisse()?></div>
                <div class="colonne"><?php echo $elmt ->getTotalCaisse()."€"?></div>
                <div class="colonne"><?php echo $elmt ->getDate()?></div>
                <div class="colonne"><?php echo $elmt ->getUser()->getIdentifiant()?></div>
            
<?php
        // if ($lvl==2)
        // {
        echo '<a class="btn" href="index.php?action=FormCaisse&m=modif&id='. $elmt->getIdCaisse() .'">
            <div >Modifier</div></a>';
        echo '<a class="btn" href="index.php?action=FormCaisse&m=suppr&id='. $elmt->getIdCaisse() .'">
             <div>Supprimer</div></a>';

             echo '</div>';
                 } 
        echo'<a class="btnaj" href="index.php?action=FormCaisse&m=ajout">
                        <div> Ajouter</div></a> ';
        
        // } 
        ?>
      </section>