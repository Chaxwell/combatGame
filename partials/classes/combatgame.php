<?php

class Character
{
    protected $name;
    protected $healthPoints;
    protected $class;
    protected $strength;


    protected function attack($target)
    {
        // aze
    }

    protected function takeDamage($damage)
    {
        // aze
    }

    protected function deleteIfDead()
    {
        // aze
    }
}

class Wizard extends Character
{

    function __construct($name, $class)
    {
        $this->$name = $name;
        $this->$class = $class;
    }

    function takeDamage($damage)
    {
        // polymorphed
    }
}

class Archer extends Character
{

    function __construct($name, $class)
    {
        $this->$name = $name;
        $this->$class = $class;
    }

    function takeDamage($damage)
    {
        // polymorphed
    }
}

class Warrior extends Character
{

    function __construct($name, $class)
    {
        $this->$name = $name;
        $this->$class = $class;
    }

    function takeDamage($damage)
    {
        // polymorphed
    }
}

class CharacterManager
{
    private $_bdd;

    public function add(Character $character)
    {
        $req = $this->bdd()->prepare('INSERT INTO characters(userId, name, healthPoints, class, strength)
                                      VALUES(?, ?, ?, ?, ?)');
        $req = $this->bdd()->execute(array($character->userId, $character->name, $character->healthPoints, $character::CATEGORY, $character->strength));
    }

    private function bdd()
    {
        $this->_bdd = new PDO('mysql:host=127.0.0.1;dbname=combatgame;characterset=utf8');
        $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $this->_bdd;
    }
}
