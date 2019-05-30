<?php

class CombatLogsManager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // CRUD
    public function addLog(CombatLogs $logs)
    {
        $req = $this->bdd()->prepare("INSERT INTO fight_logs(characterId, message, date)
                                    VALUES(?, ?, ?)");
        $req->execute(array($logs->getCharacterID(), $logs->getMessage(), $this->setDate()));
    }

    public function deleteCharLogs(CombatLogs $logs)
    {
        $req = $this->bdd()->prepare("DELETE FROM fight_logs WHERE characterId = ?");
        $req->execute(array($logs->getCharacterID()));
    }


    // Get data
    public function getAllDatesFromCharacter(Character $character)
    {
        $req = $this->bdd()->prepare("SELECT date FROM fight_logs WHERE characterId = ?");
        $req->execute(array($character->getId()));

        return $req->fetchAll();
    }

    public function getAllMessagesFromCharacter(Character $character)
    {
        $req = $this->bdd()->prepare("SELECT message FROM fight_logs WHERE characterId = ?");
        $req->execute(array($character->getId()));

        return $req->fetchAll();
    }


    // Date
    public function setDate()
    {
        date_default_timezone_set("Europe/Paris");

        return date('Y-m-d H:i:s');
    }

    // PDO
    private function bdd()
    {
        return $this->pdo;
    }
}
