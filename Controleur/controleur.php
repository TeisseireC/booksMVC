<?php
    // Controleur

    function ControleurListeLivre(){
        $rows = getAllBooks();
        include 'Vues/booksList.php';
    }

    function ControleurListeUtilisateurs(){
        $rows = getAllUsers();
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
            $rows = getAllBooks();
            include 'Vues/booksList.php';
        }else{
            $loginNotValid = true;
            include 'Vues/login.php';
        }
    }

    function ControleurRegister(){
        include 'Vues/register.php';
    }
    function ControleurValidationRegister($email,$firstname,$lastname,$password,$password2){
        if($password == $password2){
            $passwordHash = password_hash($password,PASSWORD_DEFAULT);
            $result = getUser($email);
            if(isset($result['email'])){
                $compteDejaExistant = true;
                include 'Vues/register.php';
            }else{
                createUser($email,$firstname,$lastname,$passwordHash);
                $compteCreer = true;
                include 'Vues/register.php';
            }
        }else{
            $compteCreer = false;
            include 'Vues/register.php';
        }
    }

    function ControleurAddBook(){
        include 'Vues/addBook.php';
    }

    function ControleurValidationAddBook($title, $author, $genre){
        $result = getBook($title);
        if(isset($result['title'])){
            $bookAlreadyExist = true;
            include 'Vues/addBook.php';
        }else{
            createBook($title,$author,$_SESSION['user']['email'],$genre);
            $bookAlreadyExist = false;
            include 'Vues/addBook.php';
        }
    }
    function ControleurVerifyUserBook($title){
        $rows = getBook($title);
        return $rows['email'];
    }
    function ControleurModifyBook($title){
        $rows = getBook($title);
        if($rows['title'] == $title){
            include 'Vues/modifyBook.php';
        }else{
            include 'Vues/booksList.php';
        }

    }

    function ControleurValidationModifyBook($title, $author, $genre, $titleOrigin){
            modifyBook($title,$author,$genre,$titleOrigin);
            $rows = getBook($title);
            if($rows['title'] == $title && $rows['author'] == $author){
                $bookModif = true;
            }else{
                $bookModif = false;
            }
            include 'Vues/modifyBook.php';
    }

    function ControleurDeleteBook($title){
        removeBook($title);
    }

    function ControleurDisconnect(){
        include 'Vues/disconnect.php';
    }

    function ControleurDeleteUser($mail){
        removeUser($mail);
    }

    function ControleurModifyUser($mail){
        $rows = getUser($mail);
        if($rows['email'] == $mail){
            include 'Vues/modifyUser.php';
        }else{
            include 'Vues/userList.php';
        }
    }

    function ControleurValidationModifyUser($mailOrigin, $mailNew, $firstname, $lastname,$password,$password2){
        $rows = getUser($mailOrigin);
        if($password == $password2) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $rows = getUser($mailNew);
            if ($mailOrigin == $mailNew || !isset($rows['email'])) {
                    modifyUser($mailOrigin, $mailNew, $firstname, $lastname, password_hash($password, PASSWORD_DEFAULT));
                    $rows = getUser($mailNew);
                    $userModify = true;
                    include 'Vues/modifyUser.php';
            }else {
                $tabTemps = $rows;
                $rows = getUser($mailOrigin);
                if ($tabTemps['email'] != $mailOrigin) {
                    $mailInvalide = true;
                    include 'Vues/modifyUser.php';
                }
            }
        }else{
            $passwordInvalide = true;
            include 'Vues/modifyUser.php';
        }
    }
?>