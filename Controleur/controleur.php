<?php
    // Controleur

    function ControleurListeLivre(){
        include 'Vues/booksList.php';
    }

    function ControleurListeUtilisateurs(){
        include 'Vues/userList.php';
    }
    function ControleurLogin(){
        include 'Vues/login.php';
    }

    function ControleurValidationLogin($email,$password){
        //Appelle de la méthode dans le modèle pour vérifier l'user dans la BD
        //retour à la page de livres
        $rows = getUser($email);
        var_dump($rows['email']);
        if($email == $rows['email'] && password_verify($password,$rows['password'])){

            include 'Vues/booksList.php';
        }else{
        }
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