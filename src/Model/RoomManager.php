<?php

namespace App\Model;

class RoomManager extends AbstractManager
{
    public const TABLE = 'room';

    public function selectNextRoom(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT next FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function getChallenge(int $challengeId)
    {
        $statement = $this->pdo->prepare("SELECT * FROM challenge WHERE id=:id");
        $statement->bindValue('id', $challengeId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
