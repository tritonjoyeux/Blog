<?php

<<<<<<< HEAD
class UserController extends AbstractController
{
    public function loginAction()
    {
        if (empty($_POST['pseudo']) || empty($_POST['password']))
            return json_encode(["error" => "pseudo or password missing"]);

        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $result = LoginModel::login($this->pdo, $pseudo);
        if ($result != 'undefined' && sha1($password) == $result['password']) {
            $_SESSION['user'] = $result['nickname'];
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            return json_encode(["message" => "Connecter"]);
        } else {
            return json_encode(["message" => "Erreur login"]);
        }
    }

    public function disconnectAction()
    {
        $_SESSION['user'] = '';
        $_SESSION['id_user'] = '';
    }

    public function showAction()
    {
    }

    public function editAction()
    {
        return json_encode(['message' => 'Edit profil',
            'pseudo' => $_SESSION['user'],
            'firstname' => $_SESSION['firstname'],
            'lastname' => $_SESSION['lastname']]);
    }

    public function formAction()
    {
    }

    public function deleteAction()
    {
=======
class UserController{

    public function formLoginAction(){
        $view = include("../view/loginform.php");
        return $view;
    }

    public function postLoginAction(){
        if(isset($_POST['login'])){
            return json_encode(true);
        }else{
            return json_encode(false);
        }
>>>>>>> refs/remotes/origin/master
    }

}