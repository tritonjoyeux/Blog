<?php

class CommentController extends AbstractController
{
    public function createAction($content, $article_id)
    {
        if (!isset($article_id) || empty($content))
            return json_encode(['erreur' => 'Article id or content missing']);
        CommentModel::createCom($this->pdo, $content, $article_id)
            return json_encode(['message' => 'commentaire ajouté']);
    }

    public function deleteAction($id_comment)
    {
        if (isset($id_comment))
            return json_encode(['erreur' => 'id missing']);
        CommentModel::deleteCom($this->pdo, $com_id);
            return json_encode(['message' => 'commentaire supprimé']);
    }
}