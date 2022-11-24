<?php

namespace ch\comem;

/*
CREATE TABLE users (
  id int AUTO_INCREMENT PRIMARY KEY,
  firstname varchar(100) NOT NULL,
  lastname varchar(100) NOT NULL,
  email varchar(50) NOT NULL,
  mobilenumber varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  token varchar(255) NOT NULL,
  is_active int DEFAULT 0,
  date_time date NOT NULL
);
*/

class DbManager2 {

    use \superUserDB2;

    private $db;

    public function __construct() {
        $config = parse_ini_file('config' . DIRECTORY_SEPARATOR . 'db.ini', true);
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];
        $this->db = new \PDO($dsn, $username, $password);
        if (!$this->db) {
            die("Problème de connection à la base de données");
        }
    }

    public function emailExist($email): bool {
        $sql = "SELECT count(*) From users WHERE email = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getUserDatas($email, $password): array {
        $sql = "SELECT * From users WHERE email = :email;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $donnees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!$donnees) {
            $donnees[0]["email_ok"] = false;
        } else {
            if (!password_verify($password, $donnees[0]["password"])) {
                unset($donnees[0]);
                $donnees[0]["email_ok"] = true;
                $donnees[0]["password_ok"] = false;
            } else {
                $donnees[0]["email_ok"] = true;
                $donnees[0]["password_ok"] = true;
                unset($donnees[0]["password"]);
            }
        }
        return $donnees[0];
    }

    public function storeUser($firstname, $lastname, $email, $mobile, $password_hash, $token): bool {
        $stored = false;
        if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobile) && !empty($password_hash) && !empty($token)) {
            $now = date("Y-m-d H:i:s");
            $datas = [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'mobile' => $mobile,
                'password' => $password_hash,
                'token' => $token,
                'is_active' => '0',
                'datetime' => $now,
            ];
            $sql = "INSERT INTO users (firstname, lastname, email, mobilenumber, password, token, is_active, date_time) VALUES "
                    . "(:firstname, :lastname, :email, :mobile, :password, :token, :is_active, :datetime)";
            $this->db->prepare($sql)->execute($datas);
            $stored = true;
        }
        return $stored;
    }

    public function getTokenDatas($token): array {
        $sql = "SELECT is_active FROM users WHERE token = :token;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('token', $token, \PDO::PARAM_STR);
        $stmt->execute();
        $donnees = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!$donnees) {
            $donnees[0]["token_ok"] = false;
        } else {
            $donnees[0]["token_ok"] = true;
        }
        return $donnees[0];
    }
    
    public function activateAccount($token) : bool { 
        $sql = "UPDATE users SET is_active = '1' WHERE token = :token;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('token', $token, \PDO::PARAM_STR);
        return $stmt->execute();
    }
}