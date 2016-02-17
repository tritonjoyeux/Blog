<?php
class UserModel
{

    public static function editWithPassword($pdo, $password)
    {
        $q = $pdo->prepare("UPDATE `users` SET `password`=".$password." WHERE `id_user`");
        $q->execute();
    }
    public static function editWithoutPassword($pdo, $pseudo, $firstname, $lastname)
    {
        $q = $pdo->prepare("UPDATE `users` SET `nickname`=".$pseudo.",`firstname`=".$firstname.",`lastname`=".$lastname." WHERE `id_user`");
        $q->execute();
    }
}