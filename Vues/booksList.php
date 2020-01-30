<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <title>List of Books</title>
</head>

<div class="container">
    <?php
        include 'assets/header.php';
    ?>
    <body>
        <section class="section-list">
            <h1>Liste des livres et de leurs propriétaire</h1>

            <table>
                <tr>
                    <th>Titre</th>
                    <th>Autheur</th>
                    <th>Genre</th>
                    <th>Propriétaire</th>
                    <?php
                        // SI connecté et membre OU SI admin <th>Action</th>
                    ?>
                </tr>

                <tr>
                    <td class="left">Test</td>
                    <td class="left">Test</td>
                    <td class="left">Test</td>
                    <td class="left">Test</td>
                </tr>
                <?php
                    // Petit foreach des familles qui fait les 4 premiers <td class="left"></td>

                    // Si c'est le proprio du livre  OU l'admin alors ajout du <td class="center">Button pour supprimer</td>
                    // Sinon ajout de <td class="center"></td> (case vide)
                ?>

            </table>
        </section>
    </body>
    <?php
        include 'assets/footer.php';
    ?>
</div>
</html>