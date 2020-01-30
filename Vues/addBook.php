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
    <section class="section-list">
        <form action="index.php?action=addBook" method="post">
            <label>Titre
                <input type="text" name="title">
            </label>
            <label>Auteur
                <input type="text" name="author">
            </label>
            <label for="genre">Genre
                <select name="genre" id="genre">
                    <option value="1">Roman</option>
                    <option value="2">Cuisine</option>
                    <option value="3">Science-Fiction</option>
                    <option value="4">Poésie</option>
                    <option value="5">Fantaisie</option>
                    <option value="6">Nouvelle</option>
                    <option value="7">Conte</option>
                </select>
            </label>
            <button type="submit">Ajouter</button>
        </form>
    </section>
    </body>
    <?php
        include 'assets/footer.php';
    ?>
</div>
</html>