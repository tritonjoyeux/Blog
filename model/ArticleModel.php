<?php

class ArticleModel{

  public static function getList($pdo){
    $res = $pdo->query("SELECT * FROM article");
    $articles = [];
    foreach ($res as $row) {
      $articles[] = $row;
    }
    return $articles;
  }

  public static function delete($pdo, $article_id){
    $q = $pdo->prepare('DELETE FROM article WHERE id = :$article_id');
    $q->bindParam('article_id',$article_id);
    $reussi = $q->execute();
    return $reussi;
  }

  public static function create($pdo, $article_content , $article_title){
    $q = $pdo->prepare('INSERT INTO article
                          SET title = :article_title contenu = :article_content');
    $q->bindParam('article_title',$article_title);
    $q->bindParam('article_content',$article_content);
    $q->execute();
    $article_id = $pdo->lastInsertId();
    return $article_id;
  }
}