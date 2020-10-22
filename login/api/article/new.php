
<?php
require("../class/db.php");
require("../class/article.php");

// get authorised data
$title = $_POST["title"];
$author = $_POST["authors"];
$date = $_POST["date"];

$db = new Database();
$article = new Article($db);
$article->Initialize($title, $author, $date);


if ($article->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
