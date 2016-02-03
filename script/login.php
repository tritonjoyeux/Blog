<?php
session_start();
require_once('../config/dbconf.php');
$message = [];
if (isset($_POST['pseudo'])) {

    global $config;
    $pdo = new PDO($config['host'], $config['user'], $config['password']);
    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `nickname` = '" . $_POST['pseudo'] . "'");
    $stmt->bindParam("login", $_POST['pseudo']);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result === false || $_POST['password'] != $result['password']) {
        $message['etat'] = 'erreur';
    } else {
        $message['etat'] = 'connecte';
        $_SESSION['pseudo']=$result['nickname'];
    }
    echo json_encode($message);

}