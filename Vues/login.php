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

    <form class="formulaire" action="index.php?action=login&type=validation" method="post">
        <div>
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Connection</button>
    </div>
    </form>

    <div class="surprise">
        <?php
        if(isset($loginNotValid)){
            if($loginNotValid == true){
                echo "<span> 
                            Les identifiants sont incorrects
                      </span>";
            }
        }
        ?>
    </div>
</body>
</body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>