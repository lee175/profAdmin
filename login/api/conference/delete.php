
<?php
session_start();
if (!empty($_SESSION["userId"])) {
    require_once './view/dashboard.php';
} else {
    require_once './view/login-form.php';
}
?>
<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/conference.php");

$db = new Database();
$a = new Conference($db);

if ($delete) {
    $result = $a->Delete($id);
    if ($result) {
        $result = "Success";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
