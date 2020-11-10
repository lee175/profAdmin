<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../../class/db.php");
require("../../class/publication.php");

$db = new Database();
$instance = new Publication($db);

$result = $instance->FetchAll();
echo $result;
