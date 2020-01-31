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

    <form class="formulaire" action="index.php?action=modifyUser&type=validation" method="post">
        <?php
            echo  '<input type="hidden" name="emailOld" value="'.$rows['email'].'">';
            echo '<div>';
            echo        '<label for="lastname">Nom</label>';
            echo        '<input type="text" id="lastname" name="lastname" value="'.$rows['lastname'].'"  required>';
            echo    '</div>';
            echo    '<div>';
            echo        '<label for="firstname">Prenom</label>';
            echo        '<input type="text" id="firstname"  name="firstname" value="'.$rows['firstname'].'" required>';
            echo    '</div>';
            echo    '<div>';
            echo        '<label for="email">E-mail</label>';
            echo        '<input type="email" id="email"  name="email" value="'.$rows['email'].'" required>';
            echo    '</div>';
            echo    '<div>';
            echo        '<label for="password">Mot de passe</label>';
            echo        '<input type="password" id="password"  name="password" required>';
            echo    '</div>';
            echo    '<div>';
            echo        '<label for="password2">Répeter le mot de passe</label>';
            echo        '<input type="password" id="password2"  name="password2" required>';
            echo    '</div>';
        ?>
            <div>
                <button type="submit">Modifier un compte</button>
            </div>
    </form>
    <div class="surprise">
        <?php
        if(isset($userModify)) {
            if ($userModify == true) {
                echo '<span>Le compte à été modifié</span>';
            }else{
                echo '<span>La modification du compte à pas été effectué</span>';
            }
        }
        if(isset($passwordInvalide)){
            if($passwordInvalide == true){
                echo '<span>Mot de passe invalide</span>';
            }
        }
        if(isset($mailInvalide)){
            if($mailInvalide == true){
                echo '<span>Mail deja utilise</span>';
            }
        }
        ?>
    </div>
    </body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>