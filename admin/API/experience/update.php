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
$article = new Article($db);
$article->Initialize($position, $desc, $sdate, $edate);

$result = $article->Update($id);
if ($result) {
    echo "updated";
} else {
    echo "error";
}
