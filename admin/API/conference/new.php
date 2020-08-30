<?php
require("../class/db.php");
require("../class/conference.php");

// get authorised data
$title = $_POST["title"];
$people = $_POST["people"];
$date = $_POST["date"];


$db = new Database();
$c = new Conference($db);
$c->Initialize($title, $people, $date);


if ($c->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}
