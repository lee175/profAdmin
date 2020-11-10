<?php
require_once './session.php';
$log = checkuser();
if ($log) {
    // if logged in, redirect to the index page of admin
    header('Location: ../admin/index.php');
} else {
    // continue
}
?>
<html>

<head>
    <title>User Login</title>
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div>
        <form action="./api/login-action.php" method="post" id="frmLogin">
            <div class=" demo-table">

                <div class="form-head">Login</div>
                <?php
                if (isset($_SESSION["errorMessage"])) {
                ?>
                    <div class="error-message"><?php echo $_SESSION["errorMessage"]; ?></div>
                <?php
                    unset($_SESSION["errorMessage"]);
                }
                ?>
                <div class="field-column">
                    <div>
                        <label for="username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="user_name" id="username" type="text" class="demo-input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password" class="demo-input-box">
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Login" class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>