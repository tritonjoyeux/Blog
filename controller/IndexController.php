<?php

class IndexController extends AbstractController
{

    public function indexAction()
    {
        if ($_SESSION['user'] != '') {
            if(isset($_POST['profil'])){
                $articles = ArticleModel::getListOfUser($this->pdo);
                include("../view/profil.php");
            }else {
                $articles = ArticleModel::getList($this->pdo);
                include("../view/home.php");
            }
        } else {
            if(isset($_POST['accountCreate'])){
                include("../view/createUser.php");
            }else {
                include("../view/loginform.php");
            }
        }
        return;
    }

}