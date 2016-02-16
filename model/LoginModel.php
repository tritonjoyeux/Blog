<?php

class LoginModel
{

    public static function login($pdo, $pseudo)
    {
        $q = $pdo->prepare("SELECT * FROM `users` WHERE `nickname` = :pseudo");
        $q->bindParam("pseudo", $pseudo);
        $q->execute();
        $result = $q->fetch();
        return $result;
    }
}