<?php

class CharacterManager
{
    private $_bdd;
    private $_bddIP = '10.0.3.5';
    private $_bddUSR = 'root';
    private $_bddPW = '';
    private $_bddDB = 'combatgame';


    // CRUD
    public function add(Character $character)
    {
        $req = $this->bdd()->prepare('INSERT INTO characters(userId, name, healthPoints, class, strength)
                                      VALUES(?, ?, ?, ?, ?)');
        $req->execute(array($character->getUserId(), $character->getName(), $character->getHealthPoints(), strtolower($character::CATEGORY), $character->strength));
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
            $req = $this->delete($character);
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
        $req = $this->bdd()->prepare('SELECT id FROM characters WHERE userId = ? AND name = ?');
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


    // PDO
    private function bdd()
    {
        $this->_bdd = new PDO('mysql:host=' . $this->_bddIP . ';dbname=' . $this->_bddDB . ';charset=utf8', $this->_bddUSR, $this->_bddPW);
        $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $this->_bdd;
    }
}
