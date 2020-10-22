<?php
session_start();
function checkuser()
{
    if (empty($_SESSION["userId"])) {
        header('Location: /login/view/login-form.php');
    }
}
