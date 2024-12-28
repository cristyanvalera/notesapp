<?php

class Database
{
    public PDO $connection;

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

    public function query(string $query, array $params = []): PDOStatement|false
    {
        $stmt = $this->connection->prepare($query);

        $stmt->execute($params);

        return $stmt;
    }
}
