<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/editProfil.js"></script>
</head>
<body>
<div id="blockConnection">
    <form class="editProfil">
        <input type="text" name="pseudo" value="<?php echo $_SESSION['user']; ?>">Pseudo<br>
        <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>">Nom de famille<br>
        <input type="text" name="prenom" value="<?php echo $_SESSION['firstname']; ?>">prenom<br>
        <input type="password" name="checkPass">password ancien<br>
        <input type="password" name="passNew">password<br>
        <input type="submit">
    </form>
    <div id="erreur"></div>
    <div id="bon"></div>
</div>
</body>
</html>