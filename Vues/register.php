<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php?action=register&type=validation" method="post">
    <label>Nom
        <input type="text" name="lastname">
    </label>
    <label>Prenom
        <input type="text" name="firstname">
    </label>
    <label>E-mail
        <input type="mail" name="email">
    </label>
    <label>Mot de passe
        <input type="password" name="password">
    </label>
    <label>Répeter le mot de passe
        <input type="password" name="password2">
    </label>
    <button type="submit">Créer un compte</button>
</form>

</body>
</html>