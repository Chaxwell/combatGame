<?php
session_start();
require('../partials/connexion-bdd.php');

if (empty($_POST['characterName'])) {
    header('refresh:2;url=../index.php');
    die('Erreur: un champ n\'est pas rempli.');
}

$req = $bdd->prepare('INSERT INTO characters(userId, name, healthPoints, class, strength)
                      VALUES(?, ?, ?, ?, ?)');
$req->execute(array($_SESSION['userId'], htmlspecialchars($_POST['characterName']), htmlspecialchars($_POST['characterHP']), htmlspecialchars($_POST['characterClass']), htmlspecialchars($_POST['characterStrength'])));


header('Location: ../index.php');
