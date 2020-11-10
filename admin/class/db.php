<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "AtulSrivastavaIITB";

    private $conn;

    public function Connect()
    {
        $this->conn = NULL;
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        // Try connenction to the server
        if ($this->conn->connect_error) {
            echo "CONNECTION ERROR: Unable To connect to the server database";
        } else {
            return $this->conn;
        }
    }
    public function Disconnect()
    {
        $this->conn->close();
        $this->conn = NULL;
    }
}
