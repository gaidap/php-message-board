<?php
declare(strict_types=1);

final class RdbmsConnection
{
    private PDO $dbh;
    private PDOStatement $stmt;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $this->dbh = new PDO("mysql:host=" . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, $options);
    }

    public function prepareQuery($query): void
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    private function determineParamType(mixed $value): int
    {
        if (is_int($value)) {
            return PDO::PARAM_INT;
        }
        if (is_bool($value)) {
            return PDO::PARAM_BOOL;
        }
        if (is_string($value)) {
            return PDO::PARAM_STR;
        }

        return PDO::PARAM_NULL;
    }

    public function bindQueryParam($param, $value, mixed $type = null): void
    {
        if (is_null($type)) {
            $type = $this->determineParamType($value);
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function excecuteQuery(): bool
    {
        return $this->stmt->execute();
    }

    public function fetchLastInsertId(): bool|string
    {
        return $this->dbh->lastInsertId();
    }

    public function resultSet(): bool|array
    {
        $this->stmt->execute();

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function singleResult(): mixed
    {
        $this->stmt->execute();

        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
