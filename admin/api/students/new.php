<?php
require_once("../../class/db.php");
require_once("../../class/student.php");

// get authorised data
// // get authorised data
$file = $_FILES["avatarlocation"];
$title = $_POST["title"];
$description = $_POST["description"];
$name = $_POST["name"];
$degree = $_POST["degree"];
$designation = $_POST["designation"];

$db = new Database();

$student = new Student($db);
$student->Initialize($title, $name, $description, $degree, $designation);
if ($student->Submit() === True) {
    if ($file['name'] !== '') {
        $avatar = new Image();
        $avatar->Initialize($file);
        $status = $student->UploadImage($avatar);   
        if ($status === True) {
            echo 'Success';
        }
        else {
            echo 'Error uploading image';
        }
    }
    else {
        echo 'Success';
    }
}
else {
  echo "Error";
}

