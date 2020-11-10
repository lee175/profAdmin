<?php

require_once('image.php');

class News
{
    public $id;
    public $title;

    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t)
    {
        $this->title = $t;
    }

    public function Submit()
    {
        $sql = "INSERT INTO `news` (`title`)
        VALUES (?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('s', $this->title);

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
        $sql = "DELETE FROM `news` WHERE id = {$id};";
        $result = $this->conn->query($sql);
        $image = new Image();
        $img_path = $image->location . 'news/' .  $id . '.png';
        if (file_exists($img_path)) {
            unlink($img_path);
        }
        return $result;
    }

    public function UploadImage($avatar) 
    {
        if ($avatar->Extension()) {
            $img_name = 'news/' . $this->id . '.png';
            $status = $avatar->Upload($img_name); 
            return $status;
        }
        else {
            return false;
        }
    } 

    public function Update($id)
    {
        $sql = "UPDATE news SET title='$this->title' WHERE id='$id'";
        $result = $this->conn->query($sql);
        $this->id = $id;
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `news` ORDER BY id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            // Return 404 - not found
            return json_encode(array("message" => "No entry found."));
        } else {
            // Get the results in an array
            $news = array();
            while ($row = $result->fetch_assoc()) {
                $news_instance = array(
                    'id' => $row['id'],
                    'title' => $row['title'],
                );
                array_push($news, $news_instance);
            }
            return json_encode($news);
        }
    }
}
