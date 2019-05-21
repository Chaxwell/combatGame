<?php
$charManager = new CharacterManager;
$userId = $_SESSION['userId'];
$character = $charManager->getCharacterFromId($id);


echo $character;
