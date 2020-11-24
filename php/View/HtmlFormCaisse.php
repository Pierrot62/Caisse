<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Caisse</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <meta content="IE=edge" http-equiv=X-UA-Compatible>
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <script src="https://kit.fontawesome.com/13bc1841db.js" crossorigin="anonymous"></script>


</head>
<body>
<div class="formulaire center">
<form action="resultat.php" method="GET">
    <fieldset>
        <legend><i class="fas fa-address-card"></i>Votre Nom de caisse </legend>
        <label for="nomCaisse">Votre nom de Caisse*</label>
        <input type="text" name="nomCaisse" id="nomCaisse" maxlength="30" required>

        <label for="totalCaisse">Votre total d'argent*</label>
        <input type="text" name="totalCaisse" id="totalCaisse"required>

        <label for="date">la date*</label>
        <input type="date" name="date" id="date"required>

    </fieldset>
        <div class="btn">
            <button type="submit" name="valider"> Valider</button>
            <button type="reset" name="annulez" class="annule"> Annulez</button>
        </div>
    </fieldset>
</form>
</div>
</body>
</html>
