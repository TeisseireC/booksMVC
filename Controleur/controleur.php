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
        //temporaire( "dimitri.gottin@mail.com", password_hash("abcd", PASSWORD_DEFAULT));
        $rows = getUser($email);
        if($email == $rows['email'] && password_verify($password,$rows['password'])){
            $_SESSION['user']['email'] = $rows['email'];
            $_SESSION['user']['firstname'] = $rows['firstname'];
            $_SESSION['user']['lastname'] = $rows['lastname'];
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

    function ControleurValidationRegister($email,$firstname,$lastname,$password){
        createUser($email,$firstname,$lastname,$password);
        include 'Vues/booksList.php';
    }

    function ControleurDisconnect(){
        include 'Vues/disconnect.php';
    }
?>