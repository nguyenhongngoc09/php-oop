<?php

class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $dbHandler;
    private $error;

    /**
     * @param $type
     */
    public function connect($type) {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;

        if ($type === 'mysqli') {
            $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            echo "Connect database successfully via $type";
        } else {
            $options = array (
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
                echo "Connect database successfully via $type";
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }


    }

    public function connect2($type)
    {
        try {
            $this->dbHandler = new PDO(
                "mysql:host=$this->dbHost;dbname=$this->dbName",
                $this->dbUser,
                $this->dbPass
            );
            $this->dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected successfully via $type";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();

            echo $this->error;
        }
    }

    //https://www.w3schools.com/php/php_mysql_connect.asp
}