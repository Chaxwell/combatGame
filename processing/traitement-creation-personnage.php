<?php
session_start();
require('../partials/classes/combatgame.php');
require('../partials/connexion-bdd.php');

if (empty($_POST['characterName'])) {
    header('refresh:2;url=../index.php');
    die('Erreur: un champ n\'est pas rempli.');
}

$characterName = htmlspecialchars($_POST['characterName']);

switch ($_POST['characterClass']) {
    case 'wizard':
        $character = new Wizard($characterName);
        break;
    case 'warrior':
        $character = new Warrior($characterName);
        break;
    case 'archer':
        $character = new Archer($characterName);
        break;
}

$register  = new CharacterManager();
$register->add($character, $_SESSION['userId']);


header('Location: ../index.php');
