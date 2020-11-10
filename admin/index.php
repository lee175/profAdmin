<?php
require_once './login/session.php';
$log = checkuser();
if ($log) {
    // logged in please continue
} else {
    header('Location: login/index.php');
}

?>

<style>
    * {
        padding: 0;
        margin: 0;
    }

    .login_info {
        width: 100%;
        height: 30px;
        background-color: rgb(50, 50, 50);
        color: white;
        text-align: center;
        line-height: 30px;
    }

    .logout_button {
        padding: 2px 5px;
        border-radius: 5px;
        background-color: rgb(227, 15, 41);
    }

    .logout_button:hover {
        cursor: pointer;
    }
</style>
<div class="login_info">
    you are logged in as <?php echo ($_SESSION['userId']) ?>
    <span class="logout_button" onclick="logout_script()"> Logout </span>
</div>
<h1>Awards</h1>
<form action="api/awards/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Projects</h1>
<form action="api/projects/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Place" name="place" /><br>
    <input type="text" placeholder="Role" name="role" /><br>
    <input type="text" placeholder="Duration" name="duration" /><br>
    <input type="date" name="sdate" /><br>
    <input type="date" name="edate" /><br>
    <input type="text" placeholder="sponser" name="sponser" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Publications</h1>
<form action="api/publications/new.php" method="post">
    <select name="type">
        <option value="article">Article</option>
        <option value="book">Book</option>
        <option value="conference">Conference</option>
        <option value="journal">Journal</option>
        <option value="news">News</option>
    </select><br>
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="text" placeholder="Authors" name="authors" /><br>
    <input type="text" placeholder="Place" name="place" /><br>
    <input type="date" placeholder="Date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Students</h1>
<form action="api/students/new.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Name" name="name" /><br>
    <select name="degree">
        <option value="mtech">MTech</option>
        <option value="phd">PhD</option>
        <option value="post">Post Doctorate</option>
    </select><br>
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="text" placeholder="Designation" name="designation" /><br>
    <input type="file" placeholder="Image" name="avatarlocation" /><br>
    <input type="submit" value="Create" />
</form>

<h1>News</h1>
<form action="api/news/new.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="file" placeholder="Image" name="newslocation" /><br>
    <input type="submit" value="Create" />
</form>
<script>
    function logout_script() {
        // head to admin/login/logout.php
    }
</script>