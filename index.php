<?php

    require_once 'Modele\modele.php';
    require_once 'Controleur\controleur.php';
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    //On vérifiras l'user dans la session dans les vues et affichage en fonction
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
                if(isset($_POST['email']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['password'])){
                    ControleurValidationRegister($_POST['email'],$_POST['lastname'],$_POST['firstname'],$_POST['password']);
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
            ControleurListeUtilisateurs();
        }
    }else{
        ControleurListeLivre();
    }



?>