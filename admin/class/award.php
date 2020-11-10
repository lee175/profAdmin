<?php

class Award
{
    public $id;
    public $title;
    public $description;
    public $date;
    public $conn;

    function __construct($db)
    {

        $this->id = NULL;
        $this->title = NULL;
        $this->description = NULL;
        $this->date = NULL;
        $this->conn = $db->Connect();
    }
    function Initialize($t, $desc, $d)
    {
        $this->title = $t;
        $this->description = $desc;
        $this->date = $d;
    }


    public function Submit()
    {
        $sql = "INSERT INTO `awards` (`title`, `description`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->description, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `awards` WHERE id={$id};";
        $result = $this->conn->query($sql);
        // Execute the query
        return $result;
    }

    public function Update($id)
    {
        $sql = "UPDATE awards SET title='$this->title', description='$this->description', date='$this->date' WHERE id='$id'";
        $result = $this->conn->query($sql);
        // Execute the update statement
        echo mysqli_error($this->conn);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `awards` ORDER BY id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            // Return 404 - not found
            return json_encode(array("message" => "No entry found."));
        } else {
            // Get the results in an array
            $users = array();

            while ($row = $result->fetch_assoc()) {
                $user_instance = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'date' => $row['date'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
