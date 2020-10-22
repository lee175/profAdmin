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
$id = $_POST["id"];

$db = new Database();
$exp = new Experience($db);
$exp->Initialize($position, $desc, $sdate, $edate);

$result = $exp->Update($id);
if ($result) {
    echo "Success";
} else {
    echo "Error";
}
