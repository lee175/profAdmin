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
require("../class/experience.php");

// get authorised data
$position = $_POST["position"];
$desc = $_POST["description"];
$sdate = $_POST["sdate"];
$edate = $_POST["edate"];

$db = new Database();
$experience = new Experience($db);
$experience->Initialize($position, $desc, $sdate, $edate);



if ($experience->Submit() === TRUE) {
    echo "Success";
} else {
    echo "Error: ";
}
