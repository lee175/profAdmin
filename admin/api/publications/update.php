<?php
require("../../class/db.php");
require("../../class/publication.php");

// get authorised data
$id = $_POST["id"];
$type = $_POST["type"];
$title = $_POST["title"];
$authors = $_POST["authors"];
$date = $_POST["date"];
$place = $_POST["place"];
$description = $_POST["description"];


$db = new Database();
$instance = new Publication($db);
$instance->Initialize($type, $title, $description, $place, $authors, $date);

$result = $instance->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}
