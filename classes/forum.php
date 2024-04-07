<?php

require_once 'db/connections.php';


class Forum
{
    private $conn;
    private $table_name = "scpel_forum";

    public $ID;
    public $SCPEL_USER_ID;
    public $USER_NAME;
    public $USER_EMAIL;
    public $SUBJECT;
    public $MESSAGE;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->initializeTable();
    }

    public function initializeTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS " . $this->table_name . " (
            ID INT AUTO_INCREMENT PRIMARY KEY,
            SCPEL_USER_ID INT NOT NULL,
            USER_NAME VARCHAR(100) NOT NULL,
            USER_EMAIL VARCHAR(100) NOT NULL,
            SUBJECT VARCHAR(100) NOT NULL,
            MESSAGE TEXT NOT NULL,
            CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET SCPEL_USER_ID=:SCPEL_USER_ID, USER_NAME=:USER_NAME, USER_EMAIL=:USER_EMAIL, SUBJECT=:SUBJECT, MESSAGE=:MESSAGE";

        $stmt = $this->conn->prepare($query);

        $this->SCPEL_USER_ID = htmlspecialchars(strip_tags($this->SCPEL_USER_ID));
        $this->USER_NAME = htmlspecialchars(strip_tags($this->USER_NAME));
        $this->USER_EMAIL = htmlspecialchars(strip_tags($this->USER_EMAIL));
        $this->SUBJECT = htmlspecialchars(strip_tags($this->SUBJECT));
        $this->MESSAGE = htmlspecialchars(strip_tags($this->MESSAGE));

        $stmt->bindParam(":SCPEL_USER_ID", $this->SCPEL_USER_ID);
        $stmt->bindParam(":USER_NAME", $this->USER_NAME);
        $stmt->bindParam(":USER_EMAIL", $this->USER_EMAIL);
        $stmt->bindParam(":SUBJECT", $this->SUBJECT);
        $stmt->bindParam(":MESSAGE", $this->MESSAGE);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function totalPages()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }

    public function paginate($from_record_num, $records_per_page)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY ID DESC LIMIT ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->SCPEL_USER_ID = $row['SCPEL_USER_ID'];
        $this->USER_NAME = $row['USER_NAME'];
        $this->USER_EMAIL = $row['USER_EMAIL'];
        $this->SUBJECT = $row['SUBJECT'];
        $this->MESSAGE = $row['MESSAGE'];
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET SCPEL_USER_ID=:SCPEL_USER_ID, USER_NAME=:USER_NAME, USER_EMAIL=:USER_EMAIL, SUBJECT=:SUBJECT, MESSAGE=:MESSAGE WHERE ID=:ID";

        $stmt = $this->conn->prepare($query);

        $this->SCPEL_USER_ID = htmlspecialchars(strip_tags($this->SCPEL_USER_ID));
        $this->USER_NAME = htmlspecialchars(strip_tags($this->USER_NAME));
        $this->USER_EMAIL = htmlspecialchars(strip_tags($this->USER_EMAIL));
        $this->SUBJECT = htmlspecialchars(strip_tags($this->SUBJECT));
        $this->MESSAGE = htmlspecialchars(strip_tags($this->MESSAGE));
        $this->ID = htmlspecialchars(strip_tags($this->ID));

        $stmt->bindParam(":SCPEL_USER_ID", $this->SCPEL_USER_ID);
        $stmt->bindParam(":USER_NAME", $this->USER_NAME);
        $stmt->bindParam(":USER_EMAIL", $this->USER_EMAIL);
        $stmt->bindParam(":SUBJECT", $this->SUBJECT);
        $stmt->bindParam(":MESSAGE", $this->MESSAGE);
        $stmt->bindParam(":ID", $this->ID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

        $stmt = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));

        $stmt->bindParam(1, $this->ID);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
