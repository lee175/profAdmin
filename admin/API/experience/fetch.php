<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../class/db.php");
require("../class/experience.php");

$db = new Database();
$a = new Experience($db);

$result = $a->FetchAll();
echo $result;
