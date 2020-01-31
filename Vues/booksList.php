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
            <?php
                if(isset($_SESSION['user'])){
                   echo '<a href="index.php?action=addBook&type=add"><button>Ajouter un livre</button></a>';
                }
            ?>


            <table>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Genre</th>
                    <th>Propriétaire</th>
                    <?php
                        if(isset($_SESSION['user']['email'])){
                            echo '<th>Action</th>';
                        }
                    ?>
                </tr>

                <?php
                    if(isset($rows)){
                        foreach($rows as $row){
                            echo '<tr>';
                                echo '<td class="left">'.$row['title'].'</td>';
                                echo '<td class="left">'.$row['author'].'</td>';
                                echo '<td class="left">'.$row['description'].'</td>';
                                echo '<td class="left">'.$row['email'].'</td>';
                                if(isset($_SESSION['user'])){
                                    if($_SESSION['user']['type'] == 2 || $_SESSION['user']['email'] == $row['email']){
                                        echo '<td class="center">';
                                        echo '<a href="index.php?action=deleteBook&title='.$row["title"].'"><img src="Img/delete.png" width="25px" height="25px" alt="delete"></a>';
                                        echo '<a href="index.php?action=modifyBook&type=modify&title='.$row["title"].'"><img src="Img/modifier.png" width="25px" height="25px" alt="modify"></a>';
                                        echo '</td>';
                                    }
                                }
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