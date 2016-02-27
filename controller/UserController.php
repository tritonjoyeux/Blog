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
        if (empty($_POST['pseudo']) || empty($_POST['firstname']) || empty($_POST['lastname']))
            return json_encode(['error' => 'Champ pas bon']);
        UserModel::editWithoutPassword($this->pdo, $_POST['pseudo'], $_POST['firstname'], $_POST['lastname']);
        $_SESSION['user'] = $_POST['pseudo'];
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['lastname'] = $_POST['lastname'];
        if (empty($_POST['passOld']) || empty($_POST['passNew']))
            return json_encode(['message' => 'Champ modifies']);
        $result = LoginModel::login($this->pdo, $_POST['pseudo']);
        if (sha1($_POST['passOld']) != $result['password'])
        return json_encode(['error' => 'Mdp pas bon']);
        UserModel::editWithPassword($this->pdo, sha1($_POST['passNew']));
        return json_encode(['error' => 'Champ modifies']);
    }

    public function deleteAction()
    {
    }

    public function createAction()
    {
<<<<<<< HEAD

=======
>>>>>>> e7a4e70ced02856d4cba339ea7e5f10f24056667
        //CHou verif champs plus appel model
        //Quand tu appelle le model tu met le mdp en sha1 ($password=sha1($_POST['password'])
    }

}