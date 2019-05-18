<?php

class Wizard extends Character
{
    const CATEGORY = "wizard";

    public $healthPoints = 150;
    public $strength = 10;

    public function attack(Character $target)
    {
        parent::attack($target); // Contains the method computeDamage
        $this->damageAugmented($target);
        $target->takeDamage($this);
    }

    private function damageAugmented(Character $target)
    {
        if ($target::CATEGORY == "archer") {
            $this->damage = $this->damage * 2;
        }
    }
}

class Archer extends Character
{
    const CATEGORY = "archer";

    public $healthPoints = 125;
    public $strength = 15;

    public function attack(Character $target)
    {
        parent::attack($target); // Contains the method computeDamage
        $this->damageAugmented($target);
        $target->takeDamage($this);
    }

    private function damageAugmented(Character $target)
    {
        if ($target::CATEGORY == "warrior") {
            $this->damage = $this->damage * 2;
        }
    }
}

class Warrior extends Character
{
    const CATEGORY = "warrior";

    public $healthPoints = 100;
    public $strength = 20;

    public function attack(Character $target)
    {
        parent::attack($target); // Contains the method computeDamage
        $this->damageAugmented($target);
        $target->takeDamage($this);
    }

    private function damageAugmented(Character $target)
    {
        if ($target::CATEGORY == "wizard") {
            $this->damage = $this->damage * 2;
        }
    }
}
