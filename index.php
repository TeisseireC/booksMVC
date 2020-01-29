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
            }elseif($_GET['type'] == 'validation'){
                ControleurValidationLogin();
            }else{
                ControleurListeLivre();
            }
        }elseif($_GET['action'] == 'register'){
            if($_GET['type'] == 'register'){
                ControleurRegister();
            }elseif ($_GET['type'] == 'validation'){
                ControleurValidationRegister();
            }else{
                ControleurListeLivre();
            }
        }
    }else{
        ControleurListeLivre();
    }



?>