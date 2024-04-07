<?php

class Database
{
    private static $instance = null;
    private $host = "127.0.0.1";
    private $db_name = "phrunsys_scpel_community";
    private $username = "root";
    private $password = "";
    public $conn;

    private function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            if (strpos($exception->getMessage(), 'Unknown database') !== false) {
                $this->conn = new PDO("mysql:host=" . $this->host, $this->username, $this->password);
                $this->conn->exec("CREATE DATABASE IF NOT EXISTS " . $this->db_name);
                $this->conn->exec("use " . $this->db_name);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {
                echo "Connection error: " . $exception->getMessage();
            }
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
