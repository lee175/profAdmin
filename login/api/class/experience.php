<?php
class Experience
{
    public $position;
    public $desc;
    public $sdate;
    public $edate;
    public $conn;

    function __construct($db)
    {
        $this->position = NULL;
        $this->desc = NULL;
        $this->sdate = NULL;
        $this->edate = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($p, $d, $sd, $ed)
    {
        $this->position = $p;
        $this->desc = $d;
        $this->sdate = $sd;
        $this->edate = $ed;
    }


    public function Submit()
    {
        $sql = "INSERT INTO `experiences` (`position`, `description`, `date_start`, `date_end`)
        VALUES (?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssss', $this->position, $this->desc, $this->sdate, $this->edate);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `experiences` WHERE id = {$id};";
        $result = $this->conn->query($sql);
        echo mysqli_error($this->conn);
        // Execute the query
        return $result;
    }

    public function Update($id)
    {
        $sql = "UPDATE experiences SET position='$this->position', description='$this->description', date_start='$this->sdate', date_end='$this->edate' WHERE id='$id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `experiences` ORDER BY id;";
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
                    'position' => $row['position'],
                    'description' => $row['description'],
                    'date_start' => $row['date_start'],
                    'date_end' => $row['date_end'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
