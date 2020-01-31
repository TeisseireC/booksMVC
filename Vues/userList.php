<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Styles/style.css">
    <title>List of Users</title>
</head>

<div class="container">
    <?php
    include 'assets/header.php';
    ?>
    <body>
    <section class="section-list">
        <h1>Liste des utilisateurs</h1>

        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Mail</th>
                <th>Action</th>
            </tr>

            <?php
            if(isset($rows)){
                foreach ($rows as $row){
                    echo '<tr>';
                        echo '<td class="left">'.$row["lastname"].'</td>';
                        echo '<td class="left">'.$row["firstname"].'</td>';
                        echo '<td class="left">'.$row["email"].'</td>';
                        echo '<td class="center">';
                        echo '<a href="index.php?action=deleteUser&mail='.$row["email"].'"><img src="Img/delete.png" width="25px" height="25px" alt="delete"></a>';
                        echo '<a href="index.php?action=modifyUser&type=modify&mail='.$row["email"].'"><img src="Img/modifier.png" width="25px" height="25px" alt="modify"></a>';
                        echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </section>
    </body>
    <?php
    include 'assets/footer.php';
    ?>
</div>
</html>