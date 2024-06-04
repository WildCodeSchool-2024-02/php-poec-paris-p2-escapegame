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
        $statement = $this->pdo->prepare("INSERT INTO  " . static::TABLE . " 
        (user_id, challenge_id) 
        VALUES (:user_id, :challenge_id)");
        $statement->bindValue(':user_id', $userId, \PDO::PARAM_INT);
        $statement->bindValue(':challenge_id', $challengeId, \PDO::PARAM_INT);
        $statement->execute();
    }
}
