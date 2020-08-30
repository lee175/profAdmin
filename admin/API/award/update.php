<?php
require("../class/db.php");
require("../class/award.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];
$id = $_POST["id"];

$db = new Database();
$award = new Award($db);
$award->Initialize($title, $description, $date);

$result = $award->Update($id);
if ($result) {
    echo "updated";
} else {
    echo "error";
}
