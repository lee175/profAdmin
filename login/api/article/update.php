
<?php
require("../class/db.php");
require("../class/article.php");

// get authorised data
$title = $_POST["title"];
$author = $_POST["authors"];
$date = $_POST["date"];
$id = $_POST["id"];

$db = new Database();
// $article = new Article($title, $author, $date, $db, $id);
$article = new Article($db);
$article->Initialize($title, $author, $date);

$result = $article->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}
