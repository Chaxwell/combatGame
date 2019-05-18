<?php

try {
    $bdd = new PDO("mysql:host=127.0.0.1;dbname=combatgame;charset=utf8", 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $err) {
    die('Erreur: ' . $err->getMessage());
}
