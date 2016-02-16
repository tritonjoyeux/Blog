<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/home.js"></script>
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body>
<div class="home">
    Bonjour <?php echo $_SESSION['user']; ?>
    <br>
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
        titre : <input type="name" name="article_title"><br>
        contenu : <input type="name" name="article_content"><br>
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
    <?php
    var_dump($_SESSION);
    ?>
</div>
<div class="edit">

</div>
</body>
</html>