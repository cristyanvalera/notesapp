<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    public PDOStatement|false $statement;

    public function __construct(object|array $config)
    {
        $username = $config['username'];
        $password = $config['password'];

        // Para evitar que los valores de username y password estén presentes en la $dsn resultante
        unset($config['username']);
        unset($config['password']);

        $dsn = 'mysql:' . http_build_query($config, arg_separator: ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): self
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function all()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): array
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }
}
