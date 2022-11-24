<?php
$pdo = new PDO('sqlite:authdb.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("
CREATE TABLE IF NOT EXISTS users (
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
");

var_dump($pdo);
?>