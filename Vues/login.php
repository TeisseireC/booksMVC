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

<?php
    if(isset($loginNotValid)){
        if($loginNotValid == true){
            echo "<div> 
                    Les identifiants sont incorrects
              </div>";
        }
    }
?>
<form action="index.php?action=login&type=validation" method="post">
    <label>E-mail
        <input type="email" name="email">
    </label>
    <label>Mot de passe
        <input type="password" name="password">
    </label>
    <button type="submit">Connection</button>
</form>
</body>
</body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>