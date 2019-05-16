<?php

class Character
{
    protected $name;
    protected $healthPoints = 100;

    protected function _attack($target)
    {
	$this->setDamage();
	$this->damageAugmented($target);
	$target->_takeDamage($this);
    }

    protected function _takeDamage($attacker)
    {
	$this->healthPoints -= $attacker->damage;
    }

    protected function _deleteIfDead()
    {

    }

    public function getHealthpoints()
    {
	return $this->healthPoints;
    }

    public function getName()
    {
	return $this->name;
    }
    
    protected function setDamage()
    {
	$this->damage = rand(0, 4) * $this->strength;
    }
    
    protected function damageAugmented($target)
    {
	/* ici $this fait référence à l'attaquant */
	if ($this::CATEGORY == "Warrior" && $target::CATEGORY == "Wizard")
	{
	    $this->damage = $this->damage * 2;
	}
	if ($this::CATEGORY == "Wizard" && $target::CATEGORY == "Archer")
	{
	    $this->damage = $this->damage * 2;
	}
	if ($this::CATEGORY == "Archer" && $target::CATEGORY == "Warrior")
	{
	    $this->damage = $this->damage * 2;
	}
    }
}

class Wizard extends Character
{
    public $strength = 10;
    
    const CATEGORY = "Wizard";

    function __construct($name)
    {
	$this->name = $name;
    }

    public function attack($target)
    {
	$this->_attack($target);
    }

}

class Archer extends Character
{
    public $strength = 15;

    const CATEGORY = "Archer";

    function __construct($name)
    {
	$this->name = $name;
    }

    public function attack($target)
    {
	$this->_attack($target);
    }
}

class Warrior extends Character
{

    public $strength = 20;

    const CATEGORY = "Warrior";
    function __construct($name)
    {
	$this->name = $name;
    }

    public function attack($target)
    {
	$this->_attack($target);
    }
}

?>

<?php
$character1 = new Wizard("Rantanplan_Wizard");
$character2 = new Archer("Pantoufle_Archer");
$character3 = new Warrior("Grudu");
?>

<p>"<?=$character1->getName()?>" attaque "<?=$character2->getName()?>"! <i> faites de la place !!</i></p>
<?php $character1->attack($character2); ?>


<!-- affichage des states des persos -->
<!-- Ca ne sera pas comme ça en prod hein, c'est juste pour le dev pour voir si ça
     marche... -->

<p> Perso :
    <strong><?= $character1->getName() ?> </strong>
    - PDV : <?= $character1->getHealthPoints(); ?>
    - Class : <?= $character1::CATEGORY;?>
</p>

<!-- affichage des states des persos -->
<p> Perso :
    <strong><?= $character2->getName() ?> </strong>
    - PDV : <?= $character2->getHealthPoints(); ?>
    - Class : <?= $character2::CATEGORY;?>
</p>

<!-- affichage des states des persos -->
<p> Perso :
    <strong><?= $character3->getName() ?> </strong>
    - PDV : <?= $character3->getHealthPoints(); ?>
    - Class : <?= $character3::CATEGORY;?>
</p>
