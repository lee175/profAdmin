
<?php
// incoing request
$edit = $_POST['edit'];
$delete = $_POST['delete'];
$data = $_POST['data'];

require("../class/db.php");
require("../class/article.php");

$db = new Database();
$a = new Article($db);

$result = $a->FetchAll();
echo $result;
