<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/experience.php");

$db = new Database();
$a = new Experience($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "experience Deleted successfully";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
