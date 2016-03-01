<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/create.js"></script>
</head>
<body>
<div id="blockCreation">
<form class="formCreationAccount">
    <input type="text" name="pseudo" placeholder="pseudo"><span id="errorPseudo"></span><br>
    <input type="text" name="firstname" placeholder="prenom"><span id="errorFirstname"></span><br>
    <input type="text" name="lastname" placeholder="nom de famille"><span id="errorLastname"></span><br>
    <input type="password" name="password" placeholder="mot de passe"><span id="errorPassword"></span><br>
    <input type="password" name="password2" placeholder="Confirmer"><br>
    <input type="submit" value="Créer"><span id="erreurDejaPris"></span>
</form>
    <span id="bon"></span>
    <a href=""><input type="button" value="Retour"></a>
</div>
</body>
</html>