<?php
require("../../class/db.php");
require("../../class/project.php");

// get authorised data
$title = $_POST["title"];
$place = $_POST["place"];
$role = $_POST["role"];
$duration = $_POST["duration"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];
$sponser = $_POST["sponser"];

$db = new Database();
$project = new Project($db);
$project->Initialize($title, $place, $role, $duration, $sdate, $edate, $sponser);


if ($project->submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
