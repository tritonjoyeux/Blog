<?php

class ArticleModel
{

    public static function getList($pdo)
    {
        $res = $pdo->query("SELECT * FROM article");
        $articles = [];
        foreach ($res as $row) {
            $articles[] = $row;
        }
        return $articles;
    }

    public static function getListOfUser($pdo)
    {
        $res = $pdo->query("SELECT * FROM article WHERE `id_user`='".$_SESSION['id_user']."'");
        $articles = [];
        foreach ($res as $row) {
            $articles[] = $row;
        }
        return $articles;
    }

    public static function delete($pdo, $article_id)
    {
        $q = $pdo->prepare("DELETE FROM `article` WHERE `id_article` = :article_id");
        $q->bindParam('article_id', $article_id);
        $reussi = $q->execute();
        return $reussi;
    }

    public static function create($pdo, $article_content, $article_title)
    {
        $q = $pdo->prepare("INSERT INTO `article`(`id_user`, `contenu`, `date`, `title`) VALUES ('" . $_SESSION['id_user'] . "','" . $article_content . "','" . date('Y-m-d') . "','" . $article_title . "')");
        $q->execute();
        $article_id = $pdo->lastInsertId();
        return $article_id;
    }

    public static function getArticle($pdo, $article_id)
    {
        $q = $pdo->prepare("SELECT * FROM `article` WHERE `id_article` = :article_id");
        $q->bindParam("article_id", $article_id);
        $q->execute();
        $result = $q->fetch();
        return $result;
    }

    public static function editArticle($pdo, $article_id, $article_content ,$article_title)
    {

    }

}