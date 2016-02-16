<?php

require_once('../../../config/dbconf.php');
$message = [];
if (!empty($_POST['title']) && !empty($_POST['contenu'])) {
    $pdo = new PDO($config['host'], $config['user'], $config['password']);
    $req = "INSERT INTO `article`(`id_user`, `contenu`, `date`, `title`)" .
            "VALUES ('" . $_POST['id'] . "','" .
            $_POST['contenu'] . "','" .
            date('Y-m-d') ."','".
            $_POST['title'].
            "')";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result === false) {
        $message['etat'] = 'reussi';
    } else {
        $message['etat'] = 'erreur';
    }

} else {
    $message['etat'] = 'erreurChamp';
}
echo json_encode($message);