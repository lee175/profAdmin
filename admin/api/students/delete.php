<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../../class/db.php");
require("../../class/student.php");

$db = new Database();
$instance = new Student($db);

if ($delete) {
  $result = $instance->Delete($id);
  if ($result) {
    echo "Success";
  }
  else {
    echo "Error";
  }
}
