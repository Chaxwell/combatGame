<?php
$charManager = new CharacterManager;

$listCharacter = $charManager->getAllCharacters();


foreach ($listCharacter as $value) {
    var_dump($value);
}



