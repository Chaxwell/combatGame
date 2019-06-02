<?php
session_start();
require('../partials/classes/Character.php');
require('../partials/classes/CharacterChildren.php');
require('../partials/classes/CharacterManager.php');
require('../partials/connexion-bdd.php');


if (empty($_POST['characterName'])) {
    header('refresh:2;url=../index.php');
    die('Erreur: un champ n\'est pas rempli.');
}

$characterName = htmlspecialchars($_POST['characterName']);
$characterClass = ucfirst($_POST['characterClass']);

$charManager  = new CharacterManager($bdd);

// Instantiate one character's subclass
$character = new $characterClass([
    'userId' => $_SESSION['userId'],
    'name' => $characterName,
    'class' => $characterClass
]);

$charManager->add($character);

header('Location: ../index.php');
