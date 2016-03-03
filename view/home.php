<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhatSup</title>
    <script src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/home.js"></script>
    <script src="../js/article.js"></script>
    <script src="../js/burgerAnimate.js"></script>
    <link href="../css/styleHome.css" rel="stylesheet">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1, minimum-scale=0.2, width=device-width"/>
</head>
<body>
<header>
    <span id="messageAccueil">Bonjour <span id="name"><?php echo $_SESSION['user']; ?></span></span>
    <a href=""><img src="../img/logo.png" id="logo"></a>

</header>

<div id="hamburger">
    <hr class="burger" id="burger3">
    <hr class="burger" id="burger2">
    <hr class="burger" id="burger1">
</div>

<nav>
    <form class="profil" method="post">
        <input type="submit" name="profil" value="Profil" class="nav">
    </form>
    <form class="userEdit">
        <input type="submit" value="Editez votre profil" class="nav">
    </form>
    <form class="delete">
        <input type="submit" value="Supprimer votre compte" class="nav">
    </form>
    <form class="deco">
        <input type="submit" value="Log out" class="nav">
    </form>
    <input type="button" value="Ajouter un article" class="nav" id="ajouterArticle">
</nav>

<div id="opacBG">
    <div id="container">
        <div class="addArticleContainer">
            <form class="article-add">
                titre : <input type="text" name="article_title"><br>
                contenu : <textarea name="article_content"></textarea><br>
                <input type="submit" value="Add">
            </form>
            <span id="erreur-article"></span>
        </div>
        <div class="redirection"></div>
        <br>
        <div class="article">
            <ul>
                <?php foreach ($articles as $all): ?>
                    <li class="article" id="article-<?php echo $all['id_article'] ?>">
                        <form class="article_edit">
                            Titre : <span
                                class="edit_title_<?php echo $all['id_article'] ?>"><?php echo $all['title']; ?></span>
                            <br>
                            Contenu : <span
                                class="edit_content_<?php echo $all['id_article'] ?>"><?php echo $all['contenu'];
                                ?></span><?php
                            if ($all['id_user'] == $_SESSION['id_user']){
                            ?>

                            <input type="hidden" name="id_article" value="<?php echo $all['id_article'] ?>">
                            <br>
                            <input type="submit" class="editAction editAction_<?php echo $all['id_article'] ?>"
                                   value="Edit">
                        </form>

                        <input type="button" value="Edit" class="editButton editButton_<?php echo $all['id_article'] ?>"
                               id="<?php echo $all['id_article'] ?>">

                        <form class="article_delete">
                            <input type="hidden" name="id_article" value="<?php echo $all['id_article'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                        <?php
                        }
                        ?>
                        <br><br>
                    </li>

                <?php endforeach; ?>
            </ul>
            <br>
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
    </div>
</div>
</body>
</html>