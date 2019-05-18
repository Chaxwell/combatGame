<?php

// create_list_all_character_exceptUser.php


$charManager = new CharacterManager;
$listCharacters = $charManager->getAllCharactersExceptConnectedUser($_SESSION['userId']);
?>

<form>
	<?php foreach ($listCharacters as $character) : ?>
		<div class="list-group-item list-group-item-action">
			<input type="radio" id="<?= $character['id']; ?>" name="perso">
			<label for="<?= $character['id']; ?>">
				<?= $character['name'] . ' - ' . $character['class'] . ' - ' . $character['healthPoints'] . 'pdv'; ?>
			</label>
		</div>
	<?php endforeach; ?>
</form>