<?php
session_start();
require('../partials/classes/combatgame.php');
require('../partials/connexion-bdd.php');

if (empty($_POST['characterName'])) {
    header('refresh:2;url=../index.php');
    die('Erreur: un champ n\'est pas rempli.');
}

$characterName = htmlspecialchars($_POST['characterName']);
$characterClass = ucfirst($_POST['characterClass']);

$character = new $characterClass($characterName);

$register  = new CharacterManager();
$register->add($character, $_SESSION['userId']);


header('Location: ../index.php');
