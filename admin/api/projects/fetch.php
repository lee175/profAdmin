<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../../class/db.php");
require("../../class/project.php");

$db = new Database();
$instance = new Project($db);

$result = $instance->FetchAll();
echo $result;
