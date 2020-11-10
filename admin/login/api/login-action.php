<?php
session_start();

$user_name = $_POST["user_name"];
$password = $_POST["password"];

require("../class/admin.php");
require("../class/db.php");

$db = new Database();
$instance = new Admin($db);

// check for user existance
// $user_exits = $instance->checkAdmin($user_name, $password);
// user_exist array[id,user_name, name,email]
// problem with sql

$_SESSION["userId"] = "chusli";
$_SESSION["name"] = "Bruce lee";
$_SESSION["email"] = "sdfsf@mail.com";


header('Location: ../index.php');
