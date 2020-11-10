<?php
class Publication
{
    public $type;
    public $title;
    public $description;
    public $place;
    public $authors;
    public $date;
    public $conn;

    function __construct($db)
    {
        $this->type = NULL;
        $this->title = NULL;
        $this->description = NULL;
        $this->place = NULL;
        $this->authors = NULL;
        $this->date = NULL;
        $this->conn = $db->Connect();
    }
    
    function Initialize($type, $title, $description, $place, $authors, $date)
    {
        $this->type = $type;
        $this->title = $title;
        $this->description = $description;
        $this->place = $place;
        $this->authors = $authors;
        $this->date = $date;
    }

    public function Submit()
    {
        $sql = "INSERT INTO `publications` (`type`, `title`, `description`, `place`, `authors`, `date`) VALUES (?,?,?,?,?,?)";
        $query = $this->conn->prepare($sql);
        $query->bind_param('ssssss', $this->type, $this->title, $this->description, $this->place, $this->authors, $this->date);
        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `publications` WHERE id = {$id};";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function Update($id)
    {
        $sql = "UPDATE publications SET type='$this->type', title='$this->title', place='$this->place', authors='$this->authors', description='$this->description', date='$this->date' WHERE id='$id'";
        $result = $this->conn->query($sql);
        echo mysqli_error($this->conn);
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `publications` ORDER BY id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            return json_encode(array("message" => "No entry found."));
        } else {
            $array = array();
            while ($row = $result->fetch_assoc()) {
                $e = array(
                    'id' => $row['id'],
                    'type' => $row['type'],
                    'title' => $row['title'],
                    'authors' => $row['authors'],
                    'place' => $row['place'],
                    'date' => $row['date'],
                    'description' => $row['description']
                );

                array_push($array, $e);
            }
            return json_encode($array);
        }
    }
}