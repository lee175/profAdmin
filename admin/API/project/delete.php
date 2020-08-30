<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/project.php");

$db = new Database();
$a = new Project($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "Project Deleted successfully";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
