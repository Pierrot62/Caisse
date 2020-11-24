<?php
function totalFondCaisse()
{
    $tab = [100, 50, 20, 10, 5, 2, 1, '0_50', '0_20', '0_10', '0_05', '0_02', '0_01'];
    $s = 0;
    for ($i = 0; $i < count($tab); $i++) {
        $billet = "B" . $tab[$i];
        $s += $_POST[$billet] * str_replace('_', '.', $tab[$i]);
    }
    return $s;
}
function alert()
{
    if (totalFondCaisse() >= 500) {
        echo '<br>Alert > fond 500';
    } else {
        echo "";
    }
}
$somme = totalFondCaisse();
?>
<header>
    <div class="header-1">
        <img src="Img/Logo_Afpa.jpg">
        <p>Identifiant : <?php echo  $_SESSION['identifiant'] ?></p>
        <p>N°Caisse : <?php echo $_SESSION['numCaisse'] ?></p>
        <p>Date : <?php echo date('d-m-y') ?></p>
        <p>Total en caisse : <?php echo totalFondCaisse() ?> € <?php alert() ?></p>
        <div class="a"><a href="index.php?action=fondCaisse&m=deconnect">Deconnexion</a></div>
    </div>
</header>
<div class="main">
    <?php $id = 0 ?>
    <form action="index.php?action=TicketAffichage" method="POST">
        <select name="ticket" id="ticket">
            <?php
            $listeTicket = TicketManager::getList();
            foreach ($listeTicket as $ticket) {
                echo '<option value=" ' .  $ticket->getidTicket() . '">' . $ticket->getDate() . '</option>';
            }
            ?>
            <input type="submit" name="submit" id="submit" value="Voir Tciket">
        </select>
    </form>
</div>
<div class="main-center">
    <div class="main-center-left">
        <div class="main-6">
            <div class="main-tab">
                <span>
                    <p>Article</p>
                </span>
                <p>T-Shirt</p>
            </div>
            <div class="main-tab-2">
                <span>
                    <p>Prix</p>
                </span>
                <p>15 euro</p>
            </div>
            <div class="main-tab">
                <span>
                    <p>Modifier</p>
                </span>
                <p><a href="index"><i class="fas fa-pen"></i></a></p>
            </div>
            <div class="main-tab-2">
                <span>
                    <p>Supprimer</p>
                </span>
                <p><a href="index"><i class="fas fa-times"></i></a></p>
            </div>
        </div>
    </div>
    <div class="espace"></div>
    <div class="espace"></div>
    <div class="espace"></div>
    <div class="main-center-right">
        <div class="titre-main">
            <h2>Ajouter un produit</h2>
        </div>
        <div class="main-ref">
            <div class="ref-main">
                <p>Reference : </p>
                <input type="text" placeholder="Reference" maxlength="50" />
                <select>
                    <option>
                        Libelle
                    </option>
                </select>
                <br>
                <input type="number" placeholder="Quantite" maxlength="50" />
                <br>
            </div>
        </div>
        <div class="margin"></div>
        <div class="submit"><input type="submit" value="Valider"></div>
    </div>
</div>
<div class="total">
    <label>Total : <span>1500 euro</span></label>
    <div class="espace"></div>
    <input type="submit" value="Valider">
</div>
<div class="main-bottom">
    <a href="index.php?action=TicketAffichage">Décaissement </a>
</div>