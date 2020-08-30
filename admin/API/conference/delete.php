<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/conference.php");

$db = new Database();
$a = new Conference($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "conference Deleted successfully";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
