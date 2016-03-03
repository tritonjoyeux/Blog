<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/login.js"></script>
    <link href="../css/styleLogin.css" rel="stylesheet">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1, minimum-scale=0.2, width=device-width"/>

</head>
<body>
<header>
    <a href=""><img src="../img/logo.png" id="logo"></a>

</header>
<div id="blockConnection">
    <form class="login">
        <span id="text_connection">Connection a What-Sup</span><br><br>
        <input type="text" class="connec" name="pseudo" placeholder="Pseudo"><br>
        <input type="password" class="connec" name="password" placeholder="Password"><br>
        <input type="submit" name="connection" value="Connection" id="connecButton">
    </form>
    <form method="post">
        <input type="submit" name="accountCreate" value="Créer un compte" id="creatAccount">
    </form>
</div>
<div id="erreur"></div>
<div id="bon"></div>
</body>
</html>