<?php

require_once('image.php');

class Student
{
    public $id;
    public $title;
    public $description;
    public $name;
    public $degree;
    public $designation;

    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->name = NULL;
        $this->description = NULL;
        $this->degree = NULL;
        $this->designation = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t, $n, $r, $deg, $d)
    {
        $this->title = $t;
        $this->name = $n;
        $this->description = $r;
        $this->degree = $deg;
        $this->designation = $d;
    }

    public function Submit()
    {
        $sql = "INSERT INTO `students` (`name`, `title`, `description`, `degree`, `designation`)
        VALUES (?,?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sssss', $this->name, $this->title, $this->description, $this->degree, $this->designation);

        if ($query->execute()) {
            $this->id = $this->conn->insert_id;
            return TRUE;
        } else {
            echo mysqli_error($this->conn);
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `students` WHERE id = {$id};";
        $result = $this->conn->query($sql);
        $avatar = new Image();
        $img_path = $avatar->location . 'avatars/' .  $id . '.png';
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        return $result;
    }

    public function UploadImage($avatar) 
    {
        if ($avatar->Extension()) {
            $img_name = 'avatars/' . $this->id . '.png';
            $status = $avatar->Upload($img_name); 
            return $status;
        }
        else {
            return false;
        }
    } 

    public function Update($id)
    {
        $sql = "UPDATE students SET name='$this->name', title='$this->title', description='$this->description', degree='$this->degree', designation='$this->designation' WHERE id='$id'";
        $result = $this->conn->query($sql);
        $this->id = $id;
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `students` ORDER BY id;";
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
                    'name' => $row['name'],
                    'title' => $row['title'],
                    'description' => $row['degree'],
                    'degree' => $row['degree'],
                    'designation' => $row['designation']
                );
                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
