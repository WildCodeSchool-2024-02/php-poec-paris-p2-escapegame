<?php

namespace App\Model;

// use App\Model\AbstractManager;

class SaveManager extends AbstractManager
{
    public const TABLE = 'save';

    /**
     * Save progress userId & challengeId.
     */
    public function saveProgress(int $userId, int $challengeId): void
    {
        $datetime = date('Y-m-d H:i:s');

        $statement = $this->pdo->prepare("INSERT INTO  " . static::TABLE . " 
        (user_id, challenge_id, created_at) 
        VALUES (:user_id, :challenge_id, :date_time)");
        $statement->bindValue(':user_id', $userId, \PDO::PARAM_INT);
        $statement->bindValue(':challenge_id', $challengeId, \PDO::PARAM_INT);
        $statement->bindValue(':date_time', $datetime, \PDO::PARAM_STR);
        $statement->execute();
    }
}
