<?php
class Admin
{

    public $conn;

    function __construct($db)
    {
        $this->conn = $db->Connect();
    }

    function checkAdmin($name, $password)
    {
        $sql = "SELECT * FROM `registered_users` WHERE user_name={$name} ;";

        $result = $this->conn->query($sql);
        // logic that return an array containing user info
        $row = $result->fetch_assoc();
        $user_instance = array(
            'id' => $row['id'],
            'user_name' => $row['user_name'],
            'name' => $row['display_name'],
            'email' => $row['email']
        );
        return $user_instance;
    }
}
