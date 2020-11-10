<?php
require("../../class/db.php");
require("../../class/publication.php");

$type = $_POST["type"];
$title = $_POST["title"];
$place = $_POST["place"];
$authors = $_POST["authors"];
$date = $_POST["date"];
$description = $_POST["description"];

$db = new Database();
$instance = new Publication($db);
$instance->Initialize($type, $title, $description, $place, $authors, $date);

if ($instance->submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
