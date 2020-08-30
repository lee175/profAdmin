<?php
require("../class/db.php");
require("../class/publication.php");

// get authorised data
$title = $_POST["title"];
$authors = $_POST["authors"];
$journal = $_POST["journal"];
$description = $_POST["description"];

$db = new Database();
$publication = new Publication($db);
$publication->Initialize($title, $authors, $journal, $description);


if ($publication->submit() === TRUE) {
    echo "New recordasdasd created successfully";
} else {
    echo "Error: ";
}
