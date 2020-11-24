<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire User</title>
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
        <legend><i class="fas fa-address-card"></i>Vos Identifiant </legend>
        <label for="identifiant">Votre Identifiant*</label>
        <input type="text" name="identifiant" id="identifiant" maxlength="30" required>

        <label for="motDePasse">Votre Mot de passe*</label>
        <input type="password" name="motDePasse" id="motDePasse" required>

        <label for="role">Votre role*</label>
        <input type="text" name="role" id="role" required>

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
