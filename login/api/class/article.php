<?php

class Article
{
    public $id;
    public $title;
    public $author;
    public $date;
    public $conn;

    function __construct($db)
    {
        $this->id = NULL;
        $this->title = NULL;
        $this->author = NULL;
        $this->date = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t, $a, $d)
    {
        $this->title = $t;
        $this->author = $a;
        $this->date = $d;
    }

    public function Submit()
    {
        $sql = "INSERT INTO `articles` (`title`, `authors`, `date`)
        VALUES (?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('sss', $this->title, $this->author, $this->date);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `articles` WHERE id={$id};";
        $result = $this->conn->query($sql);

        // Execute the query
        return $result;
    }


    public function Update($id)
    {
        $sql = "UPDATE articles SET title='$this->title', authors='$this->author', date='$this->date' WHERE id='$id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `articles` ORDER BY id;";
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
                    'authors' => $row['authors'],
                    'date' => $row['date'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}
