<?php
class Character
{
    // DB representation
    protected $id;
    protected $userId;
    protected $name;
    protected $healthPoints;
    protected $class;
    protected $strength;

    // Internal
    protected $damage;


    // Hydrate
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    // Setters
    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setHealthPoints(int $hp)
    {
        $this->healthPoints = $hp;
    }

    public function setClass(string $class)
    {
        $this->class = $class;
    }

    public function setStrength(int $strength)
    {
        $this->strength = $strength;
    }


    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getStrength()
    {
        return $this->strength;
    }


    // Actions
    public function attack(Character $target)
    {
        $this->computeDamage();
    }

    public function isDead()
    {
        if ($this->healthPoints <= 0) return true;
    }

    protected function takeDamage(Character $attacker)
    {
        $this->healthPoints -= $attacker->damage;
    }

    protected function computeDamage()
    {
        $this->damage = (rand(1, 10) / 10)  * $this->strength;
    }

}
