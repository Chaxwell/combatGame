<?php

// create_list_characters_connected_user.php

$listCharacters = $charManager->getCharactersFromUser($_SESSION['userId']);
?>

<!-- <label for="pet-select">Mes personnages</label> -->
<select id="pet-select" class="list-group-item list-group-item-action">
	<option value="">--Choisis un de tes persos pour attaquer--</option>
	<?php foreach ($listCharacters as $character) : ?>
		<option value="<?= $character['id']; ?>">
			<?= $character['name']; ?> - <?= $character['class']; ?> - <?= $character['healthPoints']; ?> pdv
			- Force de <?= $character['strength']; ?>
		</option>
	<?php endforeach ?>
</select>