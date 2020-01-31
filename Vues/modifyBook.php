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
        <form class="formulaire" action="index.php?action=modifyBook&type=validation" method="post">
            <?php
                echo '<input type="hidden" id="titleOrigin" name="titleOrigin" value="'.$rows['title'].'">';
                echo '<div>';
                echo    '<label for="title">Titre</label>';
                echo     '<input type="text" id="title" name="title" value="'.$rows['title'].'" required>';
                echo    '</div>';
                echo    '<div>';
                echo        '<label for="author">Auteur</label>';
                echo        '<input type="text" id="author" name="author" value="'.$rows['author'].'" required>';
                echo    '</div>';
            ?>
            <div>
                <label for="genre">Genre</label>
                <select name="genre" id="genre">
                    <option value="1">Roman</option>
                    <option value="2">Cuisine</option>
                    <option value="3">Science-Fiction</option>
                    <option value="4">Poésie</option>
                    <option value="5">Fantaisie</option>
                    <option value="6">Nouvelle</option>
                    <option value="7">Conte</option>
                </select>
            </div>
            <div>
                <button type="submit">Modifier</button>
            </div>
        </form>
        <div class="surprise">
            <?php
            if(isset($bookModif)) {
                if ($bookModif == true) {
                    echo '<span>Le livre à été modifié</span>';
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