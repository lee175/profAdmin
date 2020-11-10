<?php
session_start();
$_SESSION["userId"] = "";
$_SESSION["name"] = "";
$_SESSION["email"] = "";
session_destroy();
header("Location: ./index.php");
