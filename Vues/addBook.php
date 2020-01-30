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
        <form class="formulaire" action="index.php?action=addBook&type=add" method="post">
            <div>
                <label for="title">Titre</label>
                <input type="text" id="title" name="title">
            </div>
            <div>
                <label for="author">Auteur</label>
                <input type="text" id="author" name="author">
            </div>
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
                <button type="submit">Ajouter</button>
            </div>
        </form>
        <div class="surprise">
            <?php
            if(isset($bookAlreadyExist)){
                if($bookAlreadyExist == true){
                    echo '<span>Ce livre existe déjà</span>';
                }else{
                    echo '<span>Le livre à bien été ajouté</span>';
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