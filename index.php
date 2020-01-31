<?php

    require_once 'Modele\modele.php';
    require_once 'Controleur\controleur.php';
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    //Verification des routes
    if(isset($_GET['action'])){
        if($_GET['action'] == 'login'){
            if($_GET['type'] == 'login'){
                ControleurLogin();
            }elseif($_GET['type'] == 'validation') {
                if (isset($_POST['email']) && isset($_POST['password'])){
                    ControleurValidationLogin($_POST['email'],$_POST['password']);
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif($_GET['action'] == 'register'){
            if($_GET['type'] == 'register'){
                ControleurRegister();
            }elseif ($_GET['type'] == 'validation'){
                if(isset($_POST['email']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['password']) && isset($_POST['password'])){
                    ControleurValidationRegister($_POST['email'],$_POST['lastname'],$_POST['firstname'],$_POST['password'],$_POST['password2']);
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif($_GET['action'] == 'disconnect') {
            if($_GET['type'] == 'disconnect') {
                ControleurDisconnect();
            }elseif ($_GET['type'] == 'validation') {
                if (isset($_POST['validation']) && $_POST['validation'] == 'Yes') {
                    session_destroy();
                    header('Location: index.php');
                } else {
                    ControleurListeLivre();
                }
            }
        }elseif ($_GET['action'] == 'users'){
            if(isset($_SESSION['user']['type'])){
                if($_SESSION['user']['type'] == 2){
                    ControleurListeUtilisateurs();
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif ($_GET['action'] == 'deleteUser' and isset($_GET['mail'])){
            if(isset($_SESSION['user']['type'])){
                if($_SESSION['user']['type'] == 2){
                    ControleurDeleteUser($_GET['mail']);
                    ControleurListeUtilisateurs();
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif ($_GET['action'] == 'modifyUser' and isset($_GET['mail'])){
            if(isset($_SESSION['user']['type'])){
                if($_SESSION['user']['type'] == 2){
                    ControleurModifyUser($_GET['mail']);
                    ControleurListeUtilisateurs();
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif ($_GET['action'] == 'addBook'){
            if($_GET['type'] == 'add'){
                ControleurAddBook();
            }elseif($_GET['type'] == 'validation'){
                if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['genre'])){
                    ControleurValidationAddBook($_POST['title'], $_POST['author'], $_POST['genre']);
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif($_GET['action'] == 'modifyBook' && isset($_GET['title'])){
            $rows = ControleurVerifyUserBook($_GET['title']);
            if(isset($rows)){
                if($_SESSION['user']['email'] == $rows || $_SESSION['user']['type'] == 2){
                    if($_GET['type'] == 'modify'){
                        ControleurModifyBook($_GET['title']);
                    }elseif($_GET['type'] == 'validation'){
                        if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['genre']) && isset($_POST['titleOrigin'])){
                            ControleurValidationModifyBook($_POST['title'],$_POST['author'],$_POST['genre'],$_POST['titleOrigin']);
                        }else{
                            ControleurListeLivre();
                        }
                    }else{
                        ControleurListeLivre();
                    }
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }elseif ($_GET['action'] == 'deleteBook' && isset($_GET['title'])){
            $rows = ControleurVerifyUserBook($_GET['title']);
            if (isset($rows)) {
                if ($_SESSION['user']['type'] == 2 || $_SESSION['user']['email'] == $rows) {
                    ControleurDeleteBook($_GET['title']);
                    ControleurListeLivre();
                }else{
                    ControleurListeLivre();
                }
            }else{
                ControleurListeLivre();
            }
        }else{
            ControleurListeLivre();
        }
    }else{
        ControleurListeLivre();
    }
?>