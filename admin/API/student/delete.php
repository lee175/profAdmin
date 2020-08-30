<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];
$avatar = $_POST['avatar'];

require("../class/db.php");
require("../class/student.php");

$db = new Database();
$a = new Student($db);

$filePath = "/xampp/htdocs/Images/" . $avatar;
$result;
if ($delete) {
    // delete avatar first and then, delete the data;
    unlink($filePath);
    $result = $a->Delete($id);
}

if ($result) {
    // record deleted, delete the image of that student
    $result = "Student Deleted successfully";
}
echo $result;
