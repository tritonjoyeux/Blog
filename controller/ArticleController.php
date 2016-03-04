<?php

class ArticleController extends AbstractController
{

    public function createAction()
    {
        if (empty($_POST['article_title']) || empty($_POST['article_content']))
            return json_encode(["error" => "title or content missing"]);

        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];

        $article_id = ArticleModel::create($this->pdo, $article_content ,$article_title);

        return json_encode(["message" => "done",
            "article_id" => $article_id,
            "article_title" => $article_title,
            "article_content" => $article_content,
            "auteur" => $_SESSION['user']
        ]);

    }

    public function updateAction()
    {
        $article_id=$_POST['id_article'];
        ArticleModel::getArticle($this->pdo,$article_id);
        $result = ArticleModel::getArticle($this->pdo,$article_id);
        if($_SESSION['id_user'] != $result['id_user'])
            return json_encode(["error" => "utilisateur"]);

        if(empty($_POST['article_title']) || empty($_POST['article_content']))
            return json_encode(["error" => "champs"]);

        ArticleModel::editArticle($this->pdo,$article_id,$_POST['article_content'],$_POST['article_title']);
        return json_encode(['message' => 'update' , 'article_id' => $article_id , 'article_title' => $_POST['article_title'] , 'article_content' => $_POST['article_content']]);
    }

    public function deleteAction()
    {

        if (!isset($_POST['id_article']))
            return json_encode(["error" => "article_id missing"]);
        $article_id = $_POST['id_article'];

        $result = ArticleModel::getArticle($this->pdo,$article_id);

        if($result['id_user'] != $_SESSION['id_user'])
            return json_encode(['error' => 'utilisateur']);

        ArticleModel::delete($this->pdo, $article_id);
        return json_encode(["message" => "delete", "article_id" => $article_id]);
    }

}