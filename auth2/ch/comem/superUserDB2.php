<?php

trait superUserDB2
{
    public function createSuperUser($username, $is_superUser)
    {
        $sql = "INSERT INTO superUser (username, is_superUser) VALUES (:username, :is_superUser);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('username', $username, \PDO::PARAM_STR);
        $stmt->bindParam('is_superUser', $is_superUser, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getSuperUser($username)
    {
        $sql = "SELECT * FROM superUser WHERE username = :username;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('username', $username, \PDO::PARAM_STR);
        $stmt->execute();
        $donnees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $donnees[0];
    }

    public function updateSuperUser($username, $is_superUser)
    {
        $sql = "UPDATE superUser SET is_superUser = :is_superUser WHERE username = :username;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('username', $username, \PDO::PARAM_STR);
        $stmt->bindParam('is_superUser', $is_superUser, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteSuperUser($username)
    {
        $sql = "DELETE FROM superUser WHERE username = :username;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('username', $username, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getStatus($username)
    {
        $sql = "SELECT is_superUser FROM superUser WHERE username = :username;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('username', $username, \PDO::PARAM_STR);
        $stmt->execute();
        $donnees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $donnees[0];
    }

}