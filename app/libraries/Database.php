<?php


class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USERNAME;
    private $dbPass = DB_PASSWORD;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $conn = 'mysql:host='.$this->dbHost.';dbname='.$this->dbName;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $exception) {
            $this->error = $exception->getMessage();
            echo $this->error;
        }
    }

    /**
     * @param $sql
     */
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    /**
     * @param $parameter
     * @param $value
     * @param null $type
     */
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value) :
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value) :
                $type = PDO::PARAM_BOOL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }

        $this->statement->bindValue($parameter, $value, $type);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * Return array
     * @return mixed
     */
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Return single row as object
     *
     * @return mixed
     */
    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get the row count
     */
    public function rowCount()
    {
        $this->execute();
        return $this->statement->rowCount();
    }

}