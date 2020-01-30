<?php
    function connectPDO(){
        try{
            $pdo = new PDO(
                "mysql:host=localhost;port=3306;dbname=booksmvc;",
                "root",
                ""
            );
        }catch (Exception $e){
            die("Erreur : ".$e->getMessage());
        }
        return $pdo;
    }

    # START Users Functions
    function getAllUsers(){
        $pdo = connectPDO();
        $sql = "Select email, firstname, lastname, usergroup From users";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        return $rows = $sth->fetchAll();
    }

    function getUser($email){
        $pdo = connectPDO();
        $sql = 'Select email, firstname, lastname, usergroup From users where email = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":email", $email);
        $sth->execute();
        return $row = $sth->fetch();
    }

    function createUser($email, $firstname, $lastname, $password){
        $pdo = connectPDO();
        $sql = 'Insert into users (email, firstname, lastname, usergroup, password)
                values
                (:email,:firstname,:lastname,1,:password)';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":email", $email);
        $sth->bindParam(":firstname", $firstname);
        $sth->bindParam(":lastname", $lastname);
        $sth->bindParam(":password", $password);
        $sth->execute();
    }

    function removeUser($email){
        $pdo = connectPDO();
        $sql = 'Delete From users where email = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":email", $email);
        $sth->execute();
    }
    # END Users Functions

    # START Books Functions
    function getAllBooks(){
        $pdo = connectPDO();
        $sql = "SELECT B.title, B.author, G.description, U.firstname, U.lastname, U.email
                FROM books B, genres G, users U
                WHERE B.genre = G.id 
                AND B.owner = U.email
                ORDER BY B.id";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        return $rows = $sth->fetchAll();
    }

    function getAllBooksByOwner($userMail){
        $pdo = connectPDO();
        $sql = "SELECT B.title, B.author, G.description, U.firstname, U.lastname, U.email
                FROM books B, genres G, users U
                WHERE B.genre = G.id 
                AND B.owner = U.email
                AND B.owner = :owner
                ORDER BY B.id";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":owner", $userMail);
        $sth->execute();
        return $rows = $sth->fetchAll();
    }

    function getBook($title){
        $pdo = connectPDO();
        $sql = 'SELECT B.title, B.author, G.description, U.firstname, U.lastname, U.email
                FROM books B, genres G, users U
                WHERE B.genre = G.id 
                AND B.owner = U.email
                AND B.title = :title';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":title", $title);
        $sth->execute();
        return $row = $sth->fetch();
    }

    function createBook($title, $author, $userMail, $genre){
        $idGenre = getGenre($genre);

        $pdo = connectPDO();
        $sql = 'Insert into books (title, author, owner, genre)
                values
                (:title,:author,:userMail,:idGenre)';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":title", $title);
        $sth->bindParam(":author", $author);
        $sth->bindParam(":userMail", $userMail);
        $sth->bindParam(":idGenre", $idGenre['id']);
        $sth->execute();
    }

    function removeBook($title){
        $pdo = connectPDO();
        $sql = 'Delete From books where title = :title';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":title", $title);
        $sth->execute();
    }
    # END Books Functions

    # START Genres functions
    function getAllGenres(){
        $pdo = connectPDO();
        $sql = "Select descrition From genres";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        return $rows = $sth->fetchAll();
    }

    function getGenre($genre){
        $pdo = connectPDO();
        $sql = "Select descrition From genres Where descrition = :genre";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(":genre", $genre);
        $sth->execute();
        return $row = $sth->fetch();
    }
    # END Genres Functions
?>