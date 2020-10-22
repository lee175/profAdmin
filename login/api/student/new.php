
<?php
require("../class/db.php");
require("../class/student.php");

// get authorised data
// // get authorised data
$file = $_FILES["avatarlocation"];
$title = $_POST["title"];
$name = $_POST["name"];
$rollnumber = $_POST["rollnumber"];
$degree = $_POST["degree"];
$date = $_POST["date"];


$db = new Database();

// $student = new Student($db);
$avatar = new Avatar();
echo $file["name"] . "<br>";
$avatar->Initialize($file);
$extension = $avatar->type();
$img_name = "student" . $rollnumber . "." . $extension;
$status = $avatar->upload($img_name);

if ($status) {
    // upload the rest of the things
    $student = new Student($db);
    $student->Initialize($title, $name, $rollnumber, $degree, $date, $img_name);
    $student->submit();
    echo "student info uploaded";
} else {
    echo "error uploading the image";
}
