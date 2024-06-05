<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function userExists($username, $email)
    {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM " . static::TABLE . " WHERE name = ? OR email = ?");
        $statement->execute([$username, $email]);
        return $statement->fetchColumn() > 0;
    }

    public function save(string $userName, string $userEmail, string $userPassword)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE . " (
            name, 
            email, 
            password) 
            VALUES (
                :userName, 
                :userEmail, 
                :userPassword)
                ");
        $statement->bindValue(':userName', $userName, \PDO::PARAM_STR);
        $statement->bindValue(':userEmail', $userEmail, \PDO::PARAM_STR);
        $statement->bindValue(':userPassword', $userPassword, \PDO::PARAM_STR);
        $statement->execute();
    }
}
