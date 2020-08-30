<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../class/db.php");
require("../class/conference.php");

$db = new Database();
$a = new Conference($db);

$result = $a->FetchAll();
echo $result;
