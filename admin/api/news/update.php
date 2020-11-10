<?php
require("../../class/db.php");
require("../../class/news.php");

$file = $_FILES["newslocation"];
$title = $_POST["title"];

$db = new Database();

$news = new News($db);
$news->Initialize($title);
if ($news->Update($id) === True) {
    if ($file['name'] !== '') {
        $image = new Image();
        $image->Initialize($file);
        $status = $news->UploadImage($image);   
        if ($status === True) {
            echo 'Success';
        }
        else {
            echo 'Error uploading image';
        }
    }
    else {
        echo 'Success';
    }
}
else {
  echo "Error";
}

