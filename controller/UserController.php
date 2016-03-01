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
        $_SESSION['firstname'] = '';
        $_SESSION['lastname'] = '';
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
        UserModel::deleteUser($this->pdo);
        $_SESSION['user'] = '';
        $_SESSION['id_user'] = '';
        $_SESSION['firstname'] = '';
        $_SESSION['lastname'] = '';
        return json_encode(['message' => 'delete']);
    }

    public function createAction()
    {
        if (empty($_POST['pseudo'])) {
            $erreur['pseudo'] = 'Veuillez entrer un pseudo';
        } else if (strlen($_POST['pseudo']) < 7) {
            $erreur['pseudo'] = 'Votre pseudo est trop court';
        }

        if (empty($_POST['firstname']))
            $erreur['firstname'] = 'Veuillez entrer un prenom';

        if (empty($_POST['lastname']))
            $erreur['lastname'] = 'Veuillez entrer un nom de famille';

        if (empty($_POST['password']) || empty($_POST['password2']) || strlen($_POST['password']) < 6) {
            $erreur['password'] = 'Veuillez entrer un mot de passe d\'au moins 6 caracteres et le confimer';
        } else if ($_POST['password'] != $_POST['password2']) {
            $erreur['password'] = 'Entrez les meme mots de passe';
        }

        if (!empty($erreur)) {
            $erreur['error'] = 'champs';
            return json_encode($erreur);
        }

        $result = LoginModel::login($this->pdo, $_POST['pseudo']);
        if ($result != false) {
            $erreur['error'] = 'pris';
            return json_encode($erreur);
        }
        UserModel::createUser($this->pdo, $_POST['pseudo'], $_POST['firstname'], $_POST['lastname'], sha1($_POST['password']));
        return json_encode(['success' => 'created']);
    }

}