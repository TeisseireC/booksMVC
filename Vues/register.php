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


<form class="formulaire" action="index.php?action=register&type=validation" method="post">
    <div>
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" required>
    </div>
    <div>
        <label for="firstname">Prenom</label>
        <input type="text" id="firstname"  name="firstname" required>
    </div>
    <div>
        <label for="email">E-mail</label>
        <input type="email" id="email"  name="email" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password"  name="password" required>
    </div>
    <div>
        <label for="password2">Répeter le mot de passe</label>
        <input type="password" id="password2"  name="password2" required>
    </div>
    <div>
        <button type="submit">Créer un compte</button>
    </div>
</form>
<div class="surprise">
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
</body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>