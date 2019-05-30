<?php

class CharacterManager
{
    private $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }


    // CRUD
    public function add(Character $character)
    {
        $req = $this->bdd->prepare('INSERT INTO characters(userId, name, healthPoints, class, strength, xp)
                                      VALUES(?, ?, ?, ?, ?, ?)');
        $req->execute(array($character->getUserId(), $character->getName(), $character->getHealthPoints(), strtolower($character::CATEGORY), $character->strength, $character->getXp()));
    }

    public function update(array $kwargs, Character $character)
    {
        foreach ($kwargs as $key => $value) {
            $req = $this->bdd()->prepare("UPDATE characters SET {$key} = ? WHERE id = ?");
            $req->execute(array($value, $character->getId()));
        }
    }

    public function delete(Character $character)
    {
        $req = $this->bdd()->prepare('DELETE FROM characters WHERE id = ?');
        $req->execute(array($character->getId()));
    }

    public function deleteFromDBIfDead(Character $character)
    {
        if ($character->isDead()) {
            $this->delete($character);
        }
    }


    // Getters
    public function getCharactersFromUser(int $userId)
    {
        $req = $this->bdd()->prepare('SELECT * FROM characters WHERE userId = ?');
        $req->execute(array($userId));

        return $req->fetchAll();
    }

    public function getCharacter(int $charId)
    {
        $req = $this->bdd()->prepare('SELECT * FROM characters WHERE id = ?');
        $req->execute(array($charId));

        return $req->fetch();
    }

    public function getAllCharacters()
    {
        $req = $this->bdd()->query('SELECT * FROM characters');

        return $req->fetchAll();
    }

    public function getAllCharactersExceptConnectedUser(int $userId)
    {
        $req = $this->bdd()->prepare('SELECT * FROM characters WHERE NOT userId = ?');
        $req->execute(array($userId));

        return $req->fetchAll();
    }

    public function getCharacterIdFromCharacterName(Character $character)
    {
        $req = $this->bdd()->prepare('SELECT * FROM characters WHERE userId = ? AND name = ?');
        $req->execute(array($character->getUserId(), $character->getName()));

        return $req->fetch();
    }


    // Count
    public function countAllCharacters()
    {
        $req = $this->bdd()->query('SELECT COUNT(*) AS count FROM characters');

        return $req->fetch();
    }

    public function countCharactersFromUser(int $userId)
    {
        $req = $this->bdd()->prepare('SELECT COUNT(*) AS count FROM characters WHERE userId = ?');
        $req->execute(array($userId));

        return $req->fetch();
    }


    // bdd
    private function bdd()
    {
        return $this->bdd;
    }
}
