<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/create.js"></script>
    <link href="../css/styleCreate.css" rel="stylesheet">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1, minimum-scale=0.2, width=device-width"/>
</head>
<body>
<header>
   <a href=""><img src="../img/logo.png" id="logo"></a>

</header>
<div id="blockCreation">
<form class="formCreationAccount">
    <span id="errorPseudo"></span><br>
    <input type="text" name="pseudo" placeholder="pseudo"><br>
    <span id="errorFirstname"></span><br>
    <input type="text" name="firstname" placeholder="prenom"><br>
    <span id="errorLastname"></span><br>
    <input type="text" name="lastname" placeholder="nom de famille"><br>
    <span id="errorPassword"></span><br>
    <input type="password" name="password" placeholder="mot de passe"><br><br>
    <input type="password" name="password2" placeholder="Confirmer"><br>
    <input type="submit" value="Créer" id="buttonCreate"><span id="erreurDejaPris"></span>
</form>
    <span id="bon"></span>
    <a href=""><input type="button" value="Retour" id="buttonRetour"></a>
</div>
</body>
</html>