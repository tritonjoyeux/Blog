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
<<<<<<< HEAD
        $q->execute();
    }

    public static function createUser($pdo, $pseudo, $firstname, $lastname, $password, $date_creation, $droits)
    {

        //set les valeurs
        $q = $pdo->prepare("INSERT INTO `users`(`nickname`".$pseudo.", `firstname`".$firstname.", `lastname`".$lastname.", `password`".$password.", `date_creation`".$date_creation.", `droits`".$droits.").
            VALUES ('".$pseudo."','".$firstname."','".$lastname."','".$password."',date('Y-m-d'),'user')");
=======
>>>>>>> e7a4e70ced02856d4cba339ea7e5f10f24056667
        $q->execute();
    }

    public static function createUser($pdo, $pseudo, $firstname, $lastname, $password)
    {

        //set les valeurs
        /*$q = $pdo->prepare("INSERT INTO `users`(`nickname`, `firstname`, `lastname`, `password`, `date_creation`, `droits`).
            VALUES ('".$pseudo."',[value-2],[value-3],[value-4],date('Y-m-d'),'user')");
        $q->execute();*/
    }z
}