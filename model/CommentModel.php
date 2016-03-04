<?php

class CommentModel
{
    public static function getCom($pdo, $article_id)
    {
        $q = $pdo->prepare("SELECT * FROM `commentaire` WHERE `id_article` = :article_id");
        $q->bindParam('article_id', $article_id);
        $reussi = $q->execute();
        return $reussi;
    }

    public static function createCom($pdo, $com_content, $article_id)
    {
        $q = $pdo->prepare("INSERT INTO `commentaires`(`id_user`,`id_article` , `date`, `contenu`) VALUES ('" . $_SESSION['id_user'] . "','" . $article_id . "','" . date('Y-m-d') . "','" . $com_content . "')");
        $q->execute();
        $comment_id = $pdo->lastInsertId();
        return $comment_id;
    }

    public static function deleteCom($pdo, $id_com)
    {
        $q = $pdo->prepare("DELETE FROM `commentaires` WHERE `id_com` = :id_com");
        $q->bindParam('id_com', $id_com);
        $q->execute();
    }
}