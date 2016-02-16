<?php
require_once('../../../config/dbconf.php');
$message = [];

global $config;

$pdo = new PDO($config['host'], $config['user'], $config['password']);
$stmt = $pdo->prepare("SELECT `nickname`,`id_user`  FROM `users` WHERE 1");
$stmt->execute();
$result = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM `users`");
$stmt->execute();
$nombre = $stmt->fetch();

if ($result === false) {
    $message['etat'] = 'erreur';
} else {
    for($j=0;$j<$nombre[0];$j++){
        $message[$j]['nickname']=$result[$j]['nickname'];
        $message[$j]['id_user']=$result[$j]['id_user'];
    }
}
echo json_encode($message);
