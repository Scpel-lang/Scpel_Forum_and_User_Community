<?php

require_once  'utils/dotenv.php';

$env = __DIR__ . '/../.env';
$env = parse_env($env);


class Database
{
    private static $instance = null;
    private $host;
    private $db_name;
    private $username;
    private $password;
    public $conn;

    private function __construct()
    {
        $this->setEnv($GLOBALS['env']);
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

    public function setEnv($env)
    {
        $this->host = $env['DB_HOST'];
        $this->db_name = $env['DB_NAME'];
        $this->username = $env['DB_USERNAME'];
        $this->password = $env['DB_PASSWORD'];
    }

}
