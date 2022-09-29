<?php

class DatabasePassword
{
    public function createDatabase()
    {
        $db = new PDO('sqlite:passwords.sqlite');
        $db->exec('CREATE TABLE passwords (password BLOB)');
    }

    public function checkPassword($password)
    {
        $db = new PDO('sqlite:passwords.sqlite');
        $query = $db->prepare('SELECT * FROM passwords WHERE password = :password');
        $query->execute(array('password' => $password));
        $result = $query->fetch();
        if ($result) {
            return false;
        } else {
            return true;
        }
    }

    public function insertPassword($password)
    {
        $db = new PDO('sqlite:passwords.sqlite');
        $query = $db->prepare('INSERT INTO passwords (password) VALUES (:password)');
        $query->execute(array('password' => $password));
    }



}