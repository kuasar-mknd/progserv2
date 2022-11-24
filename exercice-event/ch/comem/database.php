<?php

namespace ch\comem;

use PDO;

class database
{
    /**
     * @var \PDO
     */
    protected $pdo;
    private $host;
    private $dbname;
    private $user;
    private $password;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }

    /**
     * Retourne la connexion PDO
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    /**
     * Select all from table
     * @return array
     */
    public function selectAll(string $table): array
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Select one thing from table
     * @return array
     */
    public function selectOne(string $table, string $id): array
    {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Insert into table
     * @return array
     */
    public function insert(string $table, array $data): array
    {
        $sql = "INSERT INTO $table (";
        foreach ($data as $key => $value) {
            $sql .= $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ') VALUES (';
        foreach ($data as $key => $value) {
            $sql .= ':' . $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ')';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }

    /**
     * Update table
     * @return array
     */
    public function update(string $table, array $data, string $id): array
    {
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= $key . ' = :' . $key . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }

    /**
     * Delete from table
     * @return array
     */
    public function delete(string $table, string $id): array
    {
        $sql = "DELETE FROM $table WHERE id = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}