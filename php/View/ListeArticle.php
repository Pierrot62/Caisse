<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>
<?php

$article = ArticleManager::getList();
?>
<section class="">
    <div class="bloc">
        <div class="colonne">Libelle Article</div>
        <div class="colonne">Prix HT</div>
        <div class="colonne">Code Barre</div>
        <div class="colonne">TVA</div>
        <div class="colonne">Catégorie</div>
        <div class="micolonne"> </div>
        <div class="micolonne"> </div>
    </div>
        <?php

foreach ($article as $elmt) {
    ?>
        <div class="bloc1">
        <div class="colonne"><?php echo $elmt->getLibelleArticle() ?></div>
            <div class="colonne"><?php echo $elmt->getPrixHT() ?></div>
            <div class="colonne"><?php echo $elmt->getCodeBarre() ?></div>
            <div class="colonne"><?php echo $elmt->getTva()->getTauxTva() ?></div>
            <div class="colonne"><?php echo $elmt->getCategorie()->getLibelleCategorie() ?></div>

        <?php
// if ($lvl==2)
    // {
    echo '<a class="btn" href="index.php?action=FormArticle&m=modif&id=' . $elmt->getIdArticle() . '">
            <div>Modifier</div></a>';
    echo '<a  class="btn"  href="index.php?action=FormArticle&m=suppr&id=' . $elmt->getIdArticle() . '">
             <div>Supprimer</div></a>';

    echo '</div>';
}
echo '<a class="btnaj" href="index.php?action=FormArticle&m=ajout">
                        <div > Ajouter</div></a> ';
// }
 ?>
      </section>

