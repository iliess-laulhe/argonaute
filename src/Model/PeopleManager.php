<?php

namespace App\Model;

class PeopleManager extends AbstractManager
{
    public const TABLE = 'people';

    public function insert(array $peoples): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $peoples['name'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}