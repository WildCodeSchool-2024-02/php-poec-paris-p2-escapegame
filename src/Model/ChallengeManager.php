<?php

namespace App\Model;

use App\Model\AbstractManager;

class ChallengeManager extends AbstractManager
{
    public const TABLE = 'challenge';

    public array $assets;
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get one row from database by ID.
     */
    public function selectType(int $id): array|false
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT type FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectAnswer(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT answer FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
