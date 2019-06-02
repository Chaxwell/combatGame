<?php
require('../partials/classes/Character.php');
require('../partials/classes/CharacterChildren.php');
require('../partials/classes/CharacterManager.php');

$charManager = new CharacterManager;
$charId = $_GET['id'];
$character = $charManager->getCharacter($charId);

switch ($character['class']) {
    case "archer":
	$imgPath = "assets/img/archer.png";
	break;
    case "warrior":
	$imgPath = "assets/img/warrior.png";
	break;
    case "wizard":
	$imgPath = "assets/img/wizard.png";
	break;
}
?>
<h4>
    <?= $character['name']; ?>    
</h4>

<img class="img-card" alt="class" src="<?= $imgPath ?>"/>

<p>
    PDV: <?= $character['healthPoints'];?> - Force: <?=$character['healthPoints'];?>
</p>
