<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Article</title>
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
        <legend><i class="fas fa-address-card"></i>Votre Libellé d'article </legend>
        <label for="libelleArticle">Votre Libellé d'article*</label>
        <input type="text" name="libelleArticle" id="libelleArticle" maxlength="30" required>

        <label for="prixHt">prix hors taxes*</label>
        <input type="number" name="prixHt" id="prixHt" required>

        <label for="codeBarre">le code barre*</label>
        <input type="number" name="codeBarre" id="codeBarre" required>

        <label for="idTva">identifiant de la tva *</label>
        <input type="number" name="idTva" id="idTva" required>

        <label for="idCategorie">identifiant de la categorie *</label>
        <input type="number" name="idCategorie" id="idCategorie" required>

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