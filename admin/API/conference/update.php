<?php
require("../class/db.php");
require("../class/conference.php");

// get authorised data
// get authorised data
$title = $_POST["title"];
$people = $_POST["people"];
$date = $_POST["date"];

$id = $_POST["id"];

$db = new Database();
// $article = new Article($title, $author, $date, $db, $id);
$article = new Conference($db);
$article->Initialize($title, $people, $date);

$result = $article->Update($id);
if ($result) {
    echo "updated";
} else {
    echo "error";
}
