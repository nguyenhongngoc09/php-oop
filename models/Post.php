<?php

class Post
{
    private $conn;
    private $table = 'posts';

    // Posts properties
    public $id;
    public $title;
    public $content;
    public $created_at;
    public $user_id;
    public $category_id;
    public $category_name;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        // Create Query
        $query = 'SELECT 
                    c.name as category_name,
                    p.category_id,
                    p.id,
                    p.title,
                    p.content,
                    p.user_id,
                    p.created_at
                FROM '.$this->table.' p 
                LEFT JOIN 
                    categories c 
                ON p.category_id = c.id
                ORDER BY p.created_at DESC';

        $statement = $this->conn->prepare($query);
        $statement->execute();
        
        return $statement;
    }
}