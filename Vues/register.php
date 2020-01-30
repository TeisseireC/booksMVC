<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <title>Document</title>
</head>
<div class="container">
    <?php
    include 'assets/header.php';
    ?>
<body>
<div>
    <?php
        if(isset($compteCreer)){
            if($compteCreer == true){
                echo '<span>Votre compte à été créer</span>';
            }else{
                echo '<span>Mot de passe incorrect(Second mot de passe faux,mot de passe non valide)</span>';
            }
        }elseif(isset($compteDejaExistant)){
            echo '<span>Compte déja existant</span>';
        }
    ?>
</div>

<form action="index.php?action=register&type=validation" method="post">
    <label>Nom
        <input type="text" name="lastname" required>
    </label>
    <label>Prenom
        <input type="text" name="firstname" required>
    </label>
    <label>E-mail
        <input type="email" name="email" required>
    </label>
    <label>Mot de passe
        <input type="password" name="password" required>
    </label>
    <label>Répeter le mot de passe
        <input type="password" name="password2" required>
    </label>
    <button type="submit">Créer un compte</button>
</form>
</body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>