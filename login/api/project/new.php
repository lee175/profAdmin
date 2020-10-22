<?php
session_start();
if (!empty($_SESSION["userId"])) {
    require_once './view/dashboard.php';
} else {
    require_once './view/login-form.php';
}
?>
<?php
require("../class/db.php");
require("../class/project.php");

// get authorised data
$title = $_POST["title"];
$place = $_POST["place"];
$role = $_POST["role"];
$duration = $_POST["duration"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];

$db = new Database();
$project = new Project($db);
$project->Initialize($title, $place, $role, $duration, $sdate, $edate);


if ($project->submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
