<?php

class UserModel
{
    private $db;

    // Constructor receives PDO database connection
    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    // Find user by username
    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT user_id, username, password, role FROM Users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return user data as associative array
    }
}
