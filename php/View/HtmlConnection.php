<header>
        <div class="header-1">
            <img src="Img/Logo_Afpa.jpg">
            <p><?php echo $titre ?></p>
            <div class="a"><a href="deconnect">Deconnexion</a></div>
        </div>
    </header>
<form class="form-Connec" action="index.php?action=connect" method="POST">
    <div class="container-form">
        <p>Connexion</p>
        <div class="container-form-center">
            <input name="identifiant" type="text" id="identifiant" placeholder="Identifiant" maxlength="50" />
        </div>
        <div class="margin"></div>
        <div class="container-form-center">
            <input name="numCaisse" type="number" id="numCaisse" placeholder="Numero Caisse" maxlength="50" />
        </div>
        <div class="margin"></div>
        <div class="container-form-center">
            <input name="motDePasse" type="password" id="motDePasse" placeholder="Mot de passe" /><br>
        </div>
        <div class="margin"></div>
        <div class="margin"></div>
        <div class="margin"></div>
        <div class="container-form-center">
            <input name="envoyer" id="envoyer" type="submit" class="submit" value="Valider" />
        </div>
    </div>
</form>