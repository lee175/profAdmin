<?php
require("../../class/db.php");
require("../../class/award.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];

$db = new Database();
$instance = new Award($db);
$instance->Initialize($title, $description, $date);


if ($instance->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
