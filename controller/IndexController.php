<?php

class IndexController extends AbstractController
{

    public function indexAction()
    {
        if ($_SESSION['user'] != '') {
            $articles = ArticleModel::getList($this->pdo);
            include("../view/home.php");
        } else {
            include("../view/loginform.php");
        }
        return;
    }

}