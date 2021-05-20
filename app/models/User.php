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

    /**
     * @param $email
     * @return bool
     */
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE user_email = :email");
        $this->db->bind(':email', $email);

        return $this->db->rowCount() > 0;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function register($data)
    {
        $this->db->query("INSERT INTO users (user_name, user_email, password) VALUES (:username, :email, :password)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        return $this->db->execute();
    }

    /**
     * @param $username
     * @param $password
     * @return false|mixed
     */
    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM users WHERE user_name = :username");
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        $hashedPass = $row->password;

        if (password_verify($password, $hashedPass)) {
            return $row;
        } else {
            return false;
        }
    }
}