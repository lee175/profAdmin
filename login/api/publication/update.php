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
require("../class/publication.php");

// get authorised data
$id = $_POST["id"];
$title = $_POST["title"];
$author = $_POST["authors"];
$journal = $_POST["journal"];
$desc = $_POST["description"];


$db = new Database();
$publication = new Publication($db);
$publication->Initialize($title, $author, $journal, $desc);

$result = $publication->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}
