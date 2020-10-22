<?php
require_once('session.php');
checkuser();

?>
<h1>Article</h1>
<form action="api/article/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Authors" name="authors" /><br>
    <input type="date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Awards</h1>
<form action="api/award/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Conference</h1>
<form action="api/conference/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="People" name="people" /><br>
    <input type="date" name="date" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Experiences</h1>
<form action="api/experience/new.php" method="post">
    <input type="text" placeholder="Position" name="position" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="date" name="sdate" /><br>
    <input type="date" name="edate" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Projects</h1>
<form action="api/project/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Place" name="place" /><br>
    <input type="text" placeholder="Role" name="role" /><br>
    <input type="text" placeholder="Duration" name="duration" /><br>
    <input type="date" name="sdate" /><br>
    <input type="date" name="edate" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Publications</h1>
<form action="api/publication/new.php" method="post">
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="text" placeholder="Authors" name="authors" /><br>
    <input type="text" placeholder="Journal" name="journal" /><br>
    <input type="text" placeholder="Description" name="description" /><br>
    <input type="submit" value="Create" />
</form>

<h1>Students</h1>
<form action="api/student/new.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Name" name="name" /><br>
    <input type="text" placeholder="Degree" name="degree" /><br>
    <input type="text" placeholder="Title" name="title" /><br>
    <input type="date" placeholder="Date" name="date" /><br>
    <input type="number" placeholder="Roll number" name="rollnumber" /><br>
    <input type="file" placeholder="Image" name="avatarlocation" /><br>
    <input type="submit" value="Create" />
</form>