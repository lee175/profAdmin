<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/publication.php");

$db = new Database();
$a = new Publication($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "Publication Deleted successfully";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
