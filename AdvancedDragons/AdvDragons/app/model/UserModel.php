<?php

class UserModel
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT user_id, username, password, role FROM Users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
