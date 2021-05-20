<?php


class User
{
    private $db;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");

        $result = $this->db->resultSet();

        return $result;
    }
}