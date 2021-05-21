<?php

class Database 
{
    private $dbHost = 'db';
    private $dbUser = 'root';
    private $dbPass = 'root';
    private $dbName = 'test';

    private $conn;

    public function connect()
    {
        try {
            $this->conn = new PDO('mysql:host='. $this->dbHost .';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->conn;
    }
}