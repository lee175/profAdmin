<?php
require_once('/xampp/htdocs/login/session.php');
checkuser();
?>
<?php
// incoing request
$delete = $_POST['delete'];
$id = $_POST['id'];

require("../class/db.php");
require("../class/article.php");

$db = new Database();
$article = new Article($db);

if ($delete) {
    $result = $article->Delete($id);
    if ($result) {
        $result = "Success";
    } else {
        $result = "Error";
    }
} else {
    $result = "Error";
}

echo $result;
