<?php
class Conference
{
    public $title;
    public $people;
    public $date;
    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->people = NULL;
        $this->date = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t, $p, $d)
    {
        $this->title = $t;
        $this->people = $p;
        $this->date = $d;
    }


    public function Submit()
    {
        $sql = "INSERT INTO `conferences` (`title`, `people`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->people, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `conferences` WHERE id = {$id};";
        $result = $this->conn->query($sql);
        // Execute the query
        return $result;
    }

    public function Update($id)
    {
        $sql = "UPDATE `conferences` SET `title` = '$this->title', `people` = '$this->people', `date` = '$this->date' WHERE `id` = '$id'";
        $result = $this->conn->query($sql);
        // Execute the update statement
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function FetchAll()
    {
        $sql = "SELECT * FROM `conferences` ORDER BY id;";
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
                    'people' => $row['people'],
                    'date' => $row['date'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
