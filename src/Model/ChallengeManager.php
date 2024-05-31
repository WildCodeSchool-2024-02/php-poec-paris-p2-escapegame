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
    public function selectChallengeType(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT type FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function setAssets(int $roomId, int $id): array
    {
        if ($roomId === 1 && $id === 1) {
            $this->assets = ["/assets/images/text1.png", "/assets/images/text2.png"];
        }
        return $this->assets;
    }

    public function selectChallengeAnswer(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT answer FROM " . static::TABLE . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();  
    }
   
}
