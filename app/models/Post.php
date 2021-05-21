<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Get all posts
     **/
    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY created_at ASC');

        return $this->db->resultSet();
    }

    public function create($postParams)
    {
        $this->db->query("INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :userId)");
        $this->db->bind(':title', $postParams['title']);
        $this->db->bind(':content', $postParams['content']);
        $this->db->bind(':userId', $postParams['user_id']);

        return $this->db->execute();
    }

    public function update($id, $postParams)
    {
        $this->db->query('UPDATE posts set title=:title, content=:content WHERE id=:id');
        $this->db->bind(':title', $postParams['title']);
        $this->db->bind(':title', $postParams['title']);
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }

    public function delete($postId)
    {
        $this->db->query('DELETE posts WHERE id=:id');
        $this->db->bind(':id', $postId);

        return $this->db->execute();
    }
}