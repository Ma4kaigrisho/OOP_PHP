<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'login_db';

    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}