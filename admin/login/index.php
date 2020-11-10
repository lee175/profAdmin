<!-- if not logged in, redirect to this place -->
<?php
require_once './session.php';
$log = checkuser();
if ($log) {
    // if logged in, redirect to the index page of admin
    header('Location: ../index.php');
} else {
    header('Location: ./login-form.php');
}
?>
<!-- if logged in, redirect to admin section, where give a logout thing -->