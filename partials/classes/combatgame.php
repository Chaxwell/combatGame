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
