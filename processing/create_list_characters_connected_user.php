<?php

// create_list_characters_connected_user.php

$charManager = new CharacterManager;
$listCharacters = $charManager->getCharactersFromUser($_SESSION['userId']);
?>

<form>
    <?php foreach ($listCharacters as $character) : ?>
        <div class="list-group-item list-group-item-action">
            <input type="radio" id="<?= $character['id']; ?>" name="perso">
            <label for="<?= $character['id']; ?>">
                <?= $character['name']; ?> - <?= $character['class']; ?> - <?= $character['healthPoints']; ?> pdv
            </label>
        </div>
    <?php endforeach ?>
</form>