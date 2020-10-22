<?php
class Publication
{
    public $title;
    public $authors;
    public $journal;
    public $desc;

    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->authors = NULL;
        $this->journal = NULL;
        $this->desc = NULL;
        $this->conn = $db->Connect();
    }
    function Initialize($t, $a, $j, $d)
    {
        $this->title = $t;
        $this->authors = $a;
        $this->journal = $j;
        $this->desc = $d;
    }

    public function Submit()
    {
        $sql = "INSERT INTO `publications` (`title`, `authors`, `journal`, `description`)
        VALUES (?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssss', $this->title, $this->authors, $this->journal, $this->desc,);

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

        // Execute the query
        return $result;
    }


    public function Update($id)
    {
        $sql = "UPDATE publications SET title='$this->title', authors='$this->authors', journal='$this->journal', description='$this->desc' WHERE id='$id'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `publications` ORDER BY id;";
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
                    'journal' => $row['journal'],
                    'description' => $row['description'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}



// get authorised data
// $title = $_POST["title"];
// $authors = $_POST["authors"];
// $journal = $_POST["journal"];
// $description = $_POST["description"];

// $publication = new Publication($title, $authors, $journal, $description, $db);

// if ($publication->submit() === TRUE) {
//     echo "New recordasdasd created successfully";
// } else {
//     echo "Error: ";
// }
