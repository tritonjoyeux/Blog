<?php

class UserModel
{

    public static function editWithPassword($pdo, $password)
    {
        $q = $pdo->prepare("UPDATE `users` SET `password`='" . $password . "' WHERE `id_user`='" . $_SESSION['id_user'] . "'");
        $q->execute();
    }

    public static function editWithoutPassword($pdo, $pseudo, $firstname, $lastname)
    {
        $q = $pdo->prepare("UPDATE `users` SET `nickname`='" . $pseudo . "',`firstname`='" . $firstname . "',`lastname`='" . $lastname . "' WHERE `id_user` = '" . $_SESSION['id_user'] . "'");
        $q->execute();
    }

    public static function createUser($pdo, $pseudo, $firstname, $lastname, $password)
    {
        $req = "INSERT INTO `users`(`nickname`, `firstname`, `lastname`, `password`, `date_creation`, `droits`) VALUES ('" . $pseudo . "','" . $firstname . "','" . $lastname . "','" . $password . "','" . date('Y-m-d') . "','user')";
        $q = $pdo->prepare($req);
        $q->execute();
        return $req;
    }

    public static function deleteUser($pdo)
    {
        $q = $pdo->prepare("DELETE FROM `users` WHERE `id_user`='".$_SESSION['id_user']."'");
        $q->execute();

        $q = $pdo->prepare("DELETE FROM `article` WHERE `id_user`='".$_SESSION['id_user']."'");
        $q->execute();

        $q = $pdo->prepare("DELETE FROM `commentaires` WHERE `id_user`='".$_SESSION['id_user']."'");
        $q->execute();
    }

}