<?php 

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "AtulSrivastavaIITB");

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($db->connect_error) {
  die("Connection to database failed: " . $db->connect_error);
}
?>