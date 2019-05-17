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

    protected function _deleteIfDead(int $healthPoints)
    {
        if ($healthPoints <= 0) {
            // aze
        }
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
        if ($this::CATEGORY == "Warrior" && $target::CATEGORY == "Wizard") {
            $this->damage = $this->damage * 2;
        }
        if ($this::CATEGORY == "Wizard" && $target::CATEGORY == "Archer") {
            $this->damage = $this->damage * 2;
        }
        if ($this::CATEGORY == "Archer" && $target::CATEGORY == "Warrior") {
            $this->damage = $this->damage * 2;
        }
    }
}

class CharacterManager
{
    private $_bdd;
    private $ip = '127.0.0.1';

    public function add(Character $character, $userId)
    {
        $req = $this->bdd()->prepare('INSERT INTO characters(userId, name, healthPoints, class, strength)
                                      VALUES(?, ?, ?, ?, ?)');
        $req->execute(array($userId, $character->getName(), $character->getHealthPoints(), strtolower($character::CATEGORY), $character->strength));
    }

    public function update(Character $character, array $kwargs, int $characterId)
    {
        foreach ($kwargs as $key => $value) {
            $req = $this->bdd()->prepare("UPDATE characters SET {$key} = ? WHERE id = ?");
            $req->execute(array($value, $characterId));
        }
    }

    public function delete(Character $character, int $characterId)
    {
        $req = $this->bdd()->prepare('DELETE FROM characters WHERE id = ?');
        $req->execute(array($characterId));
    }

    public function getCharactersFromUser($userId)
    {
        $req = $this->bdd()->prepare('SELECT * FROM characters WHERE userId = ?');
        $req->execute(array($userId));

        return $req->fetchAll();
    }

    public function getAllCharacters()
    {
        $req = $this->bdd()->query('SELECT * FROM characters');
        return $req->fetchAll();
    }

    public function getAllCharactersExceptConnectedUser($userId)
    {
	$sql="SELECT * FROM characters WHERE NOT userId = $userId";
        $req = $this->bdd()->query($sql);
        return $req->fetchAll();
    }

    public function countCharactersFromUser($userId)
    {
        $req = $this->bdd()->prepare('SELECT COUNT(*) AS count FROM characters WHERE userId = ?');
        $req->execute(array($userId));

        return $req->fetch();
    }

    private function bdd()
    {
        $this->_bdd = new PDO('mysql:host=' . $this->ip . ';dbname=combatgame;charset=utf8', 'root', 'AzertyuioP123');
        $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $this->_bdd;
    }
}

class Wizard extends Character
{
    public $strength = 10;
    public $healthPoints = 150;

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
    public $healthPoints = 125;

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
    public $healthPoints = 100;

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
