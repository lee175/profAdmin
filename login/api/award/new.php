<?php
session_start();
if (!empty($_SESSION["userId"])) {
    require_once './view/dashboard.php';
} else {
    require_once './view/login-form.php';
}
?>
<?php
require("../class/db.php");
require("../class/award.php");

// get authorised data
$title = $_POST["title"];
$description = $_POST["description"];
$date = $_POST["date"];

$db = new Database();
$article = new Award($db);
$article->Initialize($title, $description, $date);


if ($article->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
