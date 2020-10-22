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
$id = $_POST["id"];

$db = new Database();
$award = new Award($db);
$award->Initialize($title, $description, $date);

$result = $award->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}
