<?php
require 'User.php';
require 'Database.php';

class UserManagement {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function createUser($username, $email, $role) {
        $query = "INSERT INTO users (username, email, role) VALUES (?, ?, ?)";
        $this->db->executeQuery($query, [$username, $email, $role]);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $result = $this->db->executeQuery($query, [$id]);
    
        if ($result !== false && $result->rowCount() > 0) {
            $user = $result->fetch(PDO::FETCH_ASSOC);
            return new User($user['id'], $user['username'], $user['email'], $user['role']);
        } else {
            echo "User not found.";
            return null; 
        }
    }

    public function updateUser($id, $username, $email, $role) {
        $query = "UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?";
        $this->db->executeQuery($query, [$username, $email, $role, $id]);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $this->db->executeQuery($query, [$id]);
    }
}