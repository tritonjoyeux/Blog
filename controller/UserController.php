<?php

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
        return json_encode(['message' => 'Edit profil',
            'pseudo' => $_SESSION['user'],
            'firstname' => $_SESSION['firstname'],
            'lastname' => $_SESSION['lastname']]);
    }

    public function editAction()
    {
        if(empty($_POST['pseudo']) || empty($_POST['firstname']) || empty($_POST['lastname']))
            return json_encode(['error'=> 'Champ pas bon']);
        UserModel::editWithoutPassword($this->pdo,$_SESSION['pseudo'],$_SESSION['firstname'],$_SESSION['lastname']);
        if(empty($_POST['passOld']) || empty($_POST['passNew']))
            return json_encode(['message' => 'Champ modifiés']);
        $result = LoginModel::login($this->pdo, $_POST['pseudo']);
        if(sha1($_POST['passOld']) == $result($_POST['password']));
            return json_encode(['error' => 'Mdp pas bon']);
        UserModel::editWithPassword($this->pdo, $_POST['passNew']);
    }

    public function formAction()
    {
    }

    public function deleteAction()
    {
    }

}