<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <title>Se déconnecter</title>
</head>
<?php
    include 'assets/header.php';
?>
<body>
    <section class="section-disconnect">
        <h1>Êtes-vous sur de vouloir vous déconnecter ?</h1>

        <form action="index.php?action=disconnect&type=validation" method="post">
            <input type="radio" id="Yes" name="validation" value="Yes" checked>
            <label for="Yes">Oui</label>

            <input type="radio" id="No" name="validation" value="No">
            <label for="No">Non</label>

            <input type="submit" value="Valider">
        </form>
    </section>
</body>
<?php
    include 'assets/footer.php';
?>
</html>
