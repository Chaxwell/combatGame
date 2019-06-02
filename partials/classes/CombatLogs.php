<?php

class CombatLogs
{
    // DB Representation
    private $characterId;
    private $message;
    private $id;
    private $date;


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
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setCharacterID($charId)
    {
        $this->characterId = $charId;
    }

    public function setID(int $id)
    {
        $this->id = $id;
    }


    // Getters
    public function getCharacterID()
    {
        return $this->characterId;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }
}
