<?php



class Student
{
    public $title;
    public $name;
    public $rollNumber;
    public $degree;
    public $date;
    public $avatar;

    public $conn;

    function __construct($db)
    {
        $this->title = NULL;
        $this->name = NULL;
        $this->rollNumber = NULL;
        $this->degree = NULL;
        $this->date = NULL;
        $this->avatar = NULL;
        $this->conn = $db->Connect();
    }

    function Initialize($t, $n, $r, $deg, $d, $a)
    {
        $this->title = $t;
        $this->name = $n;
        $this->rollNumber = $r;
        $this->degree = $deg;
        $this->date = $d;
        $this->avatar = $a;
    }

    public function submit()
    {
        $sql = "INSERT INTO `students` (`name`, `rollnumber`,`degree`,`title`,`date`,`avatar`)
        VALUES (?,?,?,?,?,?)";

        $query = $this->conn->prepare($sql);
        $query->bind_param('ssssss', $this->name, $this->rollNumber, $this->degree, $this->title, $this->date, $this->avatar,);

        if ($query->execute()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function Delete($id)
    {
        $sql = "DELETE FROM `students` WHERE id = {$id};";
        $result = $this->conn->query($sql);

        // Execute the query
        return $result;
    }


    public function Update($id)
    {
        $sql = "UPDATE articles SET title `=$this->title`, authors = `$this->author` ,date = `$this->date`, WHERE id = `$id`";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function FetchAll()
    {
        $sql = "SELECT * FROM `students` ORDER BY id;";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 0) {
            // Return 404 - not found
            return json_encode(array("message" => "User not found."));
        } else {
            // Get the results in an array
            $users = array();

            while ($row = $result->fetch_assoc()) {
                $user_instance = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'rollnumber' => $row['rollnumber'],
                    'degree' => $row['degree'],
                    'title' => $row['title'],
                    'date' => $row['date'],
                    'avatar' => $row['avatar'],
                );

                array_push($users, $user_instance);
            }
            return json_encode($users);
        }
    }
}


class Avatar
{
    public $file;
    public $location;
    public $allowed_size;
    public $extension;

    function __construct()
    {
        // array of "name", "size, "type", "error"
        $this->file = NULL;
        $this->extension = NULL;
        $this->location = "/xampp/htdocs/Images/";
        $this->allowed_size = 12000;
    }

    function Initialize($f)
    {
        // array of "name", "size, "type", "error"
        $this->file = $f;
    }

    public function type()
    {
        $this->extension = pathinfo($this->file['name'], PATHINFO_EXTENSION);;
        if ($this->extension === "jpg" || $this->extension === "png" || $this->extension === "jpeg") {
            return $this->extension;
        } else {
            return false;
        }
    }


    public function upload($img_name)
    {
        if (move_uploaded_file($this->file["tmp_name"], $this->location .  $img_name)) {
            return true;
        } else {
            return false;
        }
    }
}

// // get authorised data
// $file = $_FILES["avatarlocation"];
// $title = $_POST["title"];
// $name = $_POST["name"];
// $rollnumber = $_POST["rollnumber"];
// $degree = $_POST["degree"];
// $date = $_POST["date"];


// $avatar = new Avatar($file);
// // Check for consitions if file already exists and then
// $uploaded = $avatar->upload();
// if ($uploaded != false) {

//     $student = new Student($title, $name, $rollnumber, $degree, $date, $uploaded, $db);

//     if ($student->submit() === TRUE) {
//         echo "New recordasdasd created successfully";
//     } else {
//         echo "Error: ";
//     }
// } else {
//     echo ("not uploaded");
// }







// Check file size
// if ($_FILES["avatarlocation"]["size"] > 500000) {
//     echo "Sorry, your file is too large.<br>";
//     $uploadOk = 0;
// } else {
//     echo "image size is okay.<br>";
// }

// // Allow certain file formats
// if (
//     $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//     && $imageFileType != "gif"
// ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
