<?php
session_start();
require_once('../../config/dbconf.php');
$message = [];
if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
    /*
     * Test de champs vide
     * requete envoyer a la BDD pour savoir si le pseudo est deja pris
     */
    global $config;
    $pdo = new PDO($config['host'], $config['user'], $config['password']);
    $req = "SELECT * FROM `users` WHERE `nickname` = '" . $_POST['pseudo'] . "'";
    $stmt = $pdo->prepare($req);
    $stmt->bindParam("login", $_POST['pseudo']);
    $stmt->execute();
    $result = $stmt->fetch();

    /*
     * Si le pseudo est deja pris alors on un message d'erreur qui sera traité par le script js
     */
    if (empty($result['nickname'])) {
        $req = "INSERT INTO `users`(`nickname`, `firstname`, `lastname`, `password`, `date_creation`, `droits`)" .
            "VALUES ('" . $_POST['pseudo'] .
            "','" . $_POST['prenom'] .
            "','" . $_POST['nom'] .
            "','" . $_POST['password'] .
            "','" . date('Y-m-d') .
            "','user')";
        $stmt = $pdo->prepare($req);
        $stmt->bindParam("login", $_POST['pseudo']);
        $stmt->execute();
        $result2 = $stmt->fetch();
        if ($result2 === false) {
            $message['etat'] = 'reussi';
        } else {
            $message['etat'] = 'erreur';
        }
    } else {
        $message['etat'] = 'dejaExistant';
    }

}else{
    $message['etat'] = 'erreurChamp';
}
echo json_encode($message);