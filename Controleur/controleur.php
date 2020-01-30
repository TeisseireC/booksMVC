<?php
    // Controleur

    function ControleurListeLivre(){
        include 'Vues/booksList.php';
    }

    function ControleurLogin(){
        include 'Vues/login.php';
    }

    function ControleurValidationLogin($email,$password){
        //Appelle de la méthode dans le modèle pour vérifier l'user dans la BD
        //retour à la page de livres
        $rows = getUser($email);
        echo $rows;
        include 'Vues/booksList.php';
    }

    function ControleurRegister(){
        include 'Vues/register.php';
    }

    function ControleurValidationRegister(){
        //Appelle de la méthode dans le modèle pour remplir l'user dans la BD si valide
        //retour à la page de livres
        include 'Vues/booksList.php';
    }

    function ControleurDisconnect(){
        include 'Vues/disconnect.php';
    }
?>