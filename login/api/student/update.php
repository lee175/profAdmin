
<?php
require("../class/db.php");
require("../class/student.php");

// get authorised data
$title = $_POST["title"];
$name = $_POST["name"];
$rollnumber = $_POST["rollnumber"];
$old_rollnumber = $_POST["old_rollnumber"];
$degree = $_POST["degree"];
$date = $_POST["date"];
$new_image = $_POST["img_status"];
$file = $_FILES["avatarlocation"];

$db = new Database();

//  if new image then delete the old image
$img_done = false;

if ($new_image) {
    // old image is
    $old_img = "student" . $old_rollnumber . "jpg"; // .jpeg / .png
    // delete the old image
    // save the new image
    $avatar = new Avatar();
    $avatar->Initialize($file);
    $extension = $avatar->type();
    $img_name = "student" . $rollnumber . "." . $extension;
    $img_done = $avatar->upload($img_name);
    //update the information
} else {
    // not a new image
    if ($rollnumber == $old_rollnumber) {
        // update the information
        $img_done = true;
    } else {
        // update the image name and

    }
}


if ($img_done) {
    $student = new Student($db);
    $student->Initialize($title, $name, $rollnumber, $degree, $date, $img_name);
    echo "student info uploaded";
} else {
    echo "error uploading the image";
}
