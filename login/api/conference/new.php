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
require("../class/conference.php");

// get authorised data
$title = $_POST["title"];
$people = $_POST["people"];
$date = $_POST["date"];


$db = new Database();
$c = new Conference($db);
$c->Initialize($title, $people, $date);


if ($c->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error";
}
