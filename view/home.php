<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/home.js"></script>
    <link href="../style/style.css" rel="stylesheet">
</head>
<body>
<div class="home">
    Bonjour <?php echo $_SESSION['user']; ?>
    <br>
    <li>
        <?php foreach ($articles as $all): ?>
            <ul class="article" id="article-<?php echo $all['id_article'] ?>">
                Titre : <?php echo $all['title']; ?>
                <br>
                Contenu : <?php echo $all['contenu']; ?>
                <a class="article_delete" href="#" data-articleid="<?php echo $all['id_article'] ?>">X</a>
            </ul>

        <?php endforeach; ?>
    </li>
    <br>
    <form class="article-add">
        titre : <input type="text" name="article_title"><br>
        contenu : <input type="text" name="article_content"><br>
        <input type="submit" value="Add">
    </form>
    <br>
    <form class="deco">
        <input type="submit" value="Disconnect">
    </form>
    <div class="redirection"></div>
    <form class="userEdit">
        <input type="submit" value="Edit">
    </form>
</div>
<div class="edit">
    <form class="editNow">
        <input type="text" id="pseudo" name="pseudo" value=""> Pseudo <br>
        <input type="text" name="firstname" id="firstname" value=""> Prenom <br>
        <input type="text" name="lastname" id="lastname" value=""> Nom de famille <br>
        <input type="password" name="passOld"> Ancien pass <br>
        <input type="password" name="passNew"> New pass<br>
        <input type="submit" value="Edit">
    </form>
</div>
</body>
</html>