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

    public static function createUser($pdo, $pseudo, $firstname, $lastname, $password, $date_creation, $droits)
    {

        //set les valeurs
        $q = $pdo->prepare("INSERT INTO `users`(`nickname`".$pseudo.", `firstname`".$firstname.", `lastname`".$lastname.", `password`".$password.", `date_creation`".$date_creation.", `droits`".$droits.").
            VALUES ('".$pseudo."','".$firstname."','".$lastname."','".$password."',date('Y-m-d'),'user')");
        $q->execute();
    }
}