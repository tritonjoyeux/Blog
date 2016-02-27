<?php

class ArticleController extends AbstractController
{

    public function createAction()
    {
        if (!isset($_POST['article_title']) || !isset($_POST['article_content']))
        return json_encode(["error" => "title or content missing"]);

        $article_title = $_POST['article_title'];
        $article_content = $_POST['article_content'];

        $article_id = ArticleModel::create($this->pdo, $article_content ,$article_title);

        return json_encode(["message" => "Créé !",
            "article_id" => $article_id,
            "article_title" => $article_title,
            "article_content" => $article_content,
        ]);

    }

    public function showAction()
    {
        return json_encode(["error" => "not implemented"]);
    }

    public function updateAction()
    {
        return json_encode(["error" => "not implemented"]);
    }

    public function deleteAction()
    {
        if (!isset($_POST['article_id']))
            return json_encode(["error" => "article_id missing"]);
        $article_id = $_POST['article_id'];

        ArticleModel::delete($this->pdo, $article_id);

        return json_encode(["message" => "Supprimé !", "article_id" => $article_id]);
    }

}