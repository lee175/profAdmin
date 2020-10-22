<?php

class Project
{
    public $title;
    public $place;
    public $role;
    public $duration;
    public $sdate;
    public $edate;
    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->place = NULL;
        $this->role = NULL;
        $this->duration = NULL;
        $this->sdate = NULL;
        $this->edate = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t, $p, $r, $d, $sd, $ed)
    {
        $this->title = $t;
        $this->place = $p;
        $this->role = $r;
        $this->duration = $d;
        $this->sdate = $sd;
        $this->edate = $ed;
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `projects` WHERE id = {$id};";
        $result = $this->conn->query($sql);

        // Execute the query
        return $result;
    }


    public function Update($id)
    {
        // error in this, cant seems to solve this
        $sql = "UPDATE projects SET title='$this->title', place='$this->place', role='$this->role', duration='$this->duration', date_start='$this->sdate', date_end='$this->edate' WHERE id='$id'";
        $result = $this->conn->query($sql);
        return $result;
    }


    public function Submit()
    {
        $sql = "INSERT INTO `projects` (`title`, `place`,`role`,`duration`, `date_start`, `date_end`)
        VALUES (?,?,?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssssss', $this->title, $this->place, $this->role, $this->duration, $this->sdate, $this->edate);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `projects` ORDER BY id;";
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
                    'place' => $row['place'],
                    'role' => $row['role'],
                    'duration' => $row['duration'],
                    'date_start' => $row['date_start'],
                    'date_end' => $row['date_end']
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
