<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function exists($email)
    {
        $statement = $this->pdo->prepare("SELECT COUNT(*) FROM " . static::TABLE . " WHERE email = ?");
        $statement->execute([$email]);
        return $statement->fetchColumn() > 0;
    }

    public function insert(string $name, string $email, string $password)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE . " (
            name, 
            email, 
            password) 
            VALUES (
                :name, 
                :email, 
                :password)
                ");
        $statement->bindValue(':name', $name, \PDO::PARAM_STR);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->bindValue(':password', $password, \PDO::PARAM_STR);
        $statement->execute();
    }
}
