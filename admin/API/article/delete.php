<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/article.php");

$db = new Database();
$a = new Article($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "Article Deleted successfully";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
