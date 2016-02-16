<?php

require_once('../../../config/dbconf.php');
$message = [];

global $config;
$pdo = new PDO($config['host'], $config['user'], $config['password']);
$stmt = $pdo->prepare("SELECT `id_article`, `id_user`, `contenu`, `date`, `title` FROM `article` WHERE 1 ORDER BY `id_article` DESC LIMIT 10");
$stmt->execute();
$result = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM `article`");
$stmt->execute();
$nombre = $stmt->fetch();



if ($result === false) {
    $message['etat'] = 'erreur';
} else {
    if($nombre[0] >= 10){
        $nombre[0]=10;
    }
    for($j=0;$j<$nombre[0];$j++){
        $message[$j]['id_article']=$result[$j]['id_article'];
        $message[$j]['id_user']=$result[$j]['id_user'];
        $message[$j]['contenu']=$result[$j]['contenu'];
        $message[$j]['date']=$result[$j]['date'];
        $message[$j]['title']=$result[$j]['title'];
    }
}
echo json_encode($message);

