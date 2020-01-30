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
        //temporaire( "dimitri.gottin@mail.com", password_hash("abcd", PASSWORD_DEFAULT));
        $rows = getUser($email);
        if($email == $rows['email'] && password_verify($password,$rows['password'])){
            $_SESSION['user']['email'] = $rows['email'];
            $_SESSION['user']['password'] = $rows['password'];
            $_SESSION['user']['type'] = $rows['usergroup'];
            include 'Vues/booksList.php';
        }else{
            $loginNotValid = true;
            include 'Vues/login.php';
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